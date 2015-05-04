<?php
class Article_model extends CI_Model {
  
  function get_all(){
    $this->db->select('*');
    $this->db->from("t_article");
    $this->db->join("t_category","t_article.category_id=t_category.category_id");
    $this->db->where("t_article.is_delete",0);
    $this->db->order_by("article_id", "desc");
    $articles = $this->db->get()->result();
    foreach($articles as $article){
      $author = $article->member_id;
      if($author==0){
        $article->author = "管理员";
      }else{
        $article->author = $this->db->get_where("t_member",array("member_id"=>$author))->row()->nickname;
      }
    }
    return $articles;
  }
  function save($article){
    $this -> db -> insert('t_article', $article);
    return $this -> db -> insert_id();
  }
  function get_article_info_by_id($article_id){
    $this->db->select("*");
    $this->db->from("t_article");
    $this->db->join("t_category","t_article.category_id=t_category.category_id");
    $this->db->where("t_article.article_id",$article_id);
    $article = $this->db->get()->row();
    if($article->member_id==0){
      $article->author = "管理员";
    }else{
      $article->author = $this->db->get_where("t_member",array("member_id"=>$article->member_id))->row()->nickname;
    }
    if($article->is_top==0){
      $article->is_top = "不置顶";
    }else{
      $article->is_top = "置顶";
    } 
    return $article;
  }
  function delete($str){
    $this->db->query("update t_article set is_delete = 1 where article_id in($str)");  
      if($this->db->affected_rows()>0){
         return TRUE;
      }
      return FALSE;
  }
  function deleteById($articleId){
  	$data = array('is_delete'=>1);
    $this->db->update('t_article',$data,array('article_id'=>$articleId));  
    return $this->db->affected_rows();
  }
  public function update($article_id,$data){
    $this->db->where('article_id',$article_id);
    $this->db->update('t_article',$data);
	  }
  public function getArticleByUser($memberId){
  	$this -> db->select('article_id,article_title,views,replys');
	$this->db->from("t_article");
	$this->db->where(array('member_id'=>$memberId,'is_delete'=>0));
	$this->db->order_by('article_id','desc');
  	return $this->db->get()->result();
  }
  function getHotArticle(){
  	date_default_timezone_set('PRC');
  	$beginDate = date('Y-m-d 00:00:00');
	$endDate = date('Y-m-d 23:59:59');
  	$this->db->select('article_id,article_title');
	$this->db->from('t_article');
	$this->db->where(array('is_delete'=>0,'article_date >'=>$beginDate,'article_date <'=>$endDate));
	$this->db->order_by('replys','desc');
	$this->db->limit(5);
	return $this->db->get()->result();
  }
  function getArticleByCate($cate){
  	$this->db->select('article_id,article_title,cover,views');
	$this->db->from("t_article");
	$this->db->where(array('is_delete'=>0,'category_id'=>$cate));
	$this->db->order_by('views','desc');
	$this->db->limit(6);
	return $this->db->get()->result();
  }
  public function addView($articleId){
  	$this->db->set('views','views+1',FALSE);
	$this->db->where('article_id',$articleId);
	$this->db->update('t_article'); 
  }
public function addReply($articleId){
	$this->db->set('replys','replys+1',FALSE);
	$this->db->where('article_id',$articleId);
	$this->db->update('t_article');
}
public function addLike($memberId,$articleId){
	date_default_timezone_set('PRC');
	$date = date('Y-m-d H:i:s');
	$data = array('member_id'=>$memberId,'like_date'=>$date,'article_id'=>$articleId);
	$this->db->insert('t_like',$data);
	$this->db->set('likes','likes+1',FALSE);
	$this->db->where('article_id',$articleId);
	$this->db->update('t_article');
	return $this->db->affected_rows();
}
public function getLike($memberId,$articleId){
	return $this->db->get_where("t_like",array('member_id'=>$memberId,'article_id'=>$articleId))->num_rows();	
}
public function getReply($articleId){
	$this->db->select('t_member.member_id,t_member.nickname,t_member.email,t_member.thumb_photo,t_reply.reply_id,t_reply.reply_date,t_reply.reply_content,t_reply.relate_id,t_reply.floor');
	$this->db->from('t_reply');
	$this->db->join("t_member","t_reply.member_id=t_member.member_id");
	$this->db->where('t_reply.article_id',$articleId);
	$this->db->order_by('reply_id','asc');
	return $this->db->get()->result();
}
public function getPReply($replyId){
	$this->db->select('t_member.nickname,t_member.email,t_reply.floor');
	$this->db->from('t_reply');
	$this->db->join('t_member','t_reply.member_id=t_member.member_id');
	$this->db->where('reply_id',$replyId);
	return $this->db->get()->row();
}
public function insertReply($data){
	 $this -> db -> insert('t_reply', $data);
    return $this -> db -> insert_id();
}
public function getCateById($cateId){
	return $this->db->get_where("t_category",array('category_id'=>$cateId))->row();
}
public function getTopArticle($startno, $pagesize,$cateId){
	$this->db->select('t_article.article_id,t_article.article_title,t_article.views,t_article.replys,t_article.member_id,t_article.article_date,t_member.email,t_member.nickname');
	$this->db->from('t_article');
	$this->db->join("t_member",'t_article.member_id=t_member.member_id');
	$this->db->where(array('is_delete'=>0,'category_id'=>$cateId));
	$this -> db -> limit($pagesize, $startno);
	$this->db->order_by('is_top','desc');
	$this->db->order_by('article_id','desc');
	return $this->db->get()->result();
}
public function getLastReply($articleId){
	$this->db->select('reply_date');
	$this->db->from('t_reply');
	$this->db->where('article_id',$articleId);
	$this->db->order_by('reply_id','desc');
	$this->db->limit(1);
	return $this->db->get()->row();
}
public function getArticleCount($cateId){
	return $this->db->get_where('t_article',array('is_delete'=>0,'category_id'=>$cateId))->num_rows();
}
public function getSearch($categoryId,$keyword){
	if($categoryId == 0){
			$this->db->select('t_category.category_title,t_article.article_id,t_article.article_title,t_article.views,t_article.replys,t_article.member_id,t_article.article_date,t_member.email,t_member.nickname');
			$this->db->from('t_article');
			$this->db->join("t_member",'t_article.member_id=t_member.member_id');	
			$this->db->join('t_category','t_article.category_id=t_category.category_id');
			$this->db->where('is_delete',0);
			
	}else{
			$this->db->select('t_article.article_id,t_article.article_title,t_article.views,t_article.replys,t_article.member_id,t_article.article_date,t_member.email,t_member.nickname');
			$this->db->from('t_article');
			$this->db->join("t_member",'t_article.member_id=t_member.member_id');
			$this->db->where(array('is_delete'=>0,'category_id'=>$categoryId));
			
	}
	$this->db->like('article_title',$keyword);
	$this->db->order_by('is_top','desc');
	$this->db->order_by('article_id','desc');
	return $this->db->get()->result();
}
public function insert_article($data) {
		$this -> db -> insert('t_article', $data);
		return $this->db->insert_id();
	}
}
