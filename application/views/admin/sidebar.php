<!-- sidebar -->
<a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
<div class="sidebar">
	<div class="antiScroll">
		<div class="antiscroll-inner">
			<div class="antiscroll-content">
				<div class="sidebar_inner">
					<div style="height: 30px;"></div>
					<div id="side_accordion" class="accordion">
						<div class="accordion-group">
							<div class="accordion-heading">
								<a href="#collapseOne" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle"> <i class="icon-th"></i>帖子管理</a>
							</div>
							<div class="accordion-body collapse" id="collapseOne">
								<div class="accordion-inner">
									<ul class="nav nav-list">
										<li>
											<a href="<?=site_url('admin/category'); ?>">种类管理</a>
										</li>
										<li>
											<a href="<?=site_url('admin/article'); ?>">内容管理</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="accordion-group">
							<div class="accordion-heading">
								<a href="#collapseTwo" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle"> <i class="icon-user"></i>人员管理 </a>
							</div>
							<div class="accordion-body collapse" id="collapseTwo">
								<div class="accordion-inner">
									<ul class="nav nav-list">
										<li>
											<a href="<?=site_url('admin/admin'); ?>">管理员管理</a>
										</li>
										<li>
											<a href="<?=site_url('admin/member'); ?>">会员管理</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
          <div class="accordion-group">
              <div class="accordion-heading">
                <a href="#collapseFour" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle"> <i class="icon-refresh"></i> 系统管理</a>
              </div>
              <div class="accordion-body collapse" id="collapseFour">
                <div class="accordion-inner">
                  <ul class="nav nav-list">
                    <li>
                      <a href="<?=site_url('admin/advice'); ?>">意见管理</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
