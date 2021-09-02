<?php
$currentUrl = url()->current();
?>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="stylesheet" href="https:////maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href="<?php echo e(asset('public/vendor/harimayco-menu/style.css')); ?>" rel="stylesheet">
<div id="hwpwrap">
	<div class="custom-wp-admin wp-admin wp-core-ui js   menu-max-depth-0 nav-menus-php auto-fold admin-bar">
		<div id="wpwrap">
			<div id="wpcontent">
				<div id="wpbody">
					<div id="wpbody-content">

						<div class="wrap">

							

							<div id="nav-menus-frame">

								<?php if(request()->has('menu')  && !empty(request()->input("menu"))): ?>
								<div id="menu-settings-column" class="metabox-holder">

									<div class="clear"></div>

									<form id="nav-menu-meta" action="" class="nav-menu-meta" method="post" enctype="multipart/form-data">
										<div id="side-sortables" class="accordion-container">
											<ul class="outer-border">
												<li class="control-section accordion-section  open add-page" id="add-page">
													<h3 class="accordion-section-title hndle" tabindex="0"> Custom Link <span class="screen-reader-text">Press return or enter to expand</span></h3>
													<div class="accordion-section-content ">
														<div class="inside">
															<div class="customlinkdiv" id="customlinkdiv">
																<p id="menu-item-url-wrap">
																	<label class="howto" for="custom-menu-item-url"> <span>URL</span>&nbsp;&nbsp;&nbsp;
																		<input id="custom-menu-item-url" name="url" type="text" class="menu-item-textbox " placeholder="url">
																	</label>
																</p>

																<p id="menu-item-name-wrap">
																	<label class="howto" for="custom-menu-item-name"> <span>Label</span>&nbsp;
																		<input id="custom-menu-item-name" name="label" type="text" class="regular-text menu-item-textbox input-with-default-title" title="Label menu">
																	</label>
																</p>

																<?php if(!empty($roles)): ?>
																<p id="menu-item-role_id-wrap">
																	<label class="howto" for="custom-menu-item-name"> <span>Role</span>&nbsp;
																		<select id="custom-menu-item-role" name="role">
																			<option value="0">Select Role</option>
																			<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																				<option value="<?php echo e($role->$role_pk); ?>"><?php echo e(ucfirst($role->$role_title_field)); ?></option>
																			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																		</select>
																	</label>
																</p>
																<?php endif; ?>

																<p class="button-controls">

																	<a  href="#" onclick="addcustommenu()"  class="button-secondary submit-add-to-menu right"  >Add menu item</a>
																	<span class="spinner" id="spincustomu"></span>
																</p>

															</div>
														</div>
													</div>
												</li>

											</ul>
										</div>
									</form>

								</div>
								<?php endif; ?>

								<div id="menu-management-liquid">
									<div id="menu-management">
										<form id="update-nav-menu" action="" method="post" enctype="multipart/form-data">
                                            <div class="menu-edit ">
												<div id="nav-menu-header">
													<div class="major-publishing-actions">
														<label class="menu-name-label howto open-label" for="menu-name"> <span>Name</span>
															<input name="menu-name" id="menu-name" type="text" class="menu-name regular-text menu-item-textbox" title="Enter menu name" value="<?php if(isset($menuTranslation)): ?><?php echo e($menuTranslation->menu_name); ?><?php endif; ?>">
															
															<input type="hidden" id="idmenu" value="<?php if(isset($menuId)): ?><?php echo e($menuId); ?><?php endif; ?>" />
															<input type="hidden" name="locale" id="locale" value="<?php echo e($locale); ?>"/>
														</label>

														<?php if(request()->has('action')): ?>
														
														<?php elseif(request()->has("menu")): ?>
														<div class="publishing-action">
															<a onclick="getmenus()" name="save_menu" id="save_menu_header" class="button button-primary menu-save">Save menu</a>
															<span class="spinner" id="spincustomu2"></span>
														</div>

														<?php else: ?>
														
														<?php endif; ?>
													</div>
												</div>
												<div id="post-body">
													<div id="post-body-content">

														<?php if(request()->has("menu")): ?>
														<h3>Menu Structure</h3>
														<div class="drag-instructions post-body-plain" style="">
															<p>
																Place each item in the order you prefer. Click on the arrow to the right of the item to display more configuration options.
															</p>
														</div>

														<?php else: ?>
														
														<?php endif; ?>

														<ul class="menu ui-sortable" id="menu-to-edit">
															<?php if(isset($menus)): ?>
															<?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<li id="menu-item-<?php echo e($m->id); ?>" class="menu-item menu-item-depth-<?php echo e($m->depth); ?> menu-item-page menu-item-edit-inactive pending" style="display: list-item;">
																<dl class="menu-item-bar">
																	<dt class="menu-item-handle">
																		<span class="item-title"> <span class="menu-item-title"> <span id="menutitletemp_<?php echo e($m->id); ?>"><?php echo e($m->label); ?></span> <span style="color: transparent;">|<?php echo e($m->id); ?>|</span> </span> <span class="is-submenu" style="<?php if($m->depth==0): ?>display: none;<?php endif; ?>">Subelement</span> </span>
																		<span class="item-controls"> <span class="item-type">Link</span> <span class="item-order hide-if-js"> <a href="<?php echo e($currentUrl); ?>?action=move-up-menu-item&menu-item=<?php echo e($m->id); ?>&_wpnonce=8b3eb7ac44" class="item-move-up"><abbr title="Move Up">↑</abbr></a> | <a href="<?php echo e($currentUrl); ?>?action=move-down-menu-item&menu-item=<?php echo e($m->id); ?>&_wpnonce=8b3eb7ac44" class="item-move-down"><abbr title="Move Down">↓</abbr></a> </span> <a class="item-edit" id="edit-<?php echo e($m->id); ?>" title=" " href="<?php echo e($currentUrl); ?>?edit-menu-item=<?php echo e($m->id); ?>#menu-item-settings-<?php echo e($m->id); ?>"> </a> </span>
																	</dt>
																</dl>

																<div class="menu-item-settings" id="menu-item-settings-<?php echo e($m->id); ?>">
																	<input type="hidden" class="edit-menu-item-id" name="menuid_<?php echo e($m->id); ?>" value="<?php echo e($m->id); ?>" />
																	<p class="description description-thin">
																		<label for="edit-menu-item-title-<?php echo e($m->id); ?>"> Label
																			<br>
																			<input type="text" id="idlabelmenu_<?php echo e($m->id); ?>" class="widefat edit-menu-item-title" name="idlabelmenu_<?php echo e($m->id); ?>" value="<?php echo e($m->label); ?>">
																		</label>
																	</p>

																	<p class="field-css-classes description description-thin">
																		<label for="edit-menu-item-classes-<?php echo e($m->id); ?>"> Class CSS (optional)
																			<br>
																			<input type="text" id="clases_menu_<?php echo e($m->id); ?>" class="widefat code edit-menu-item-classes" name="clases_menu_<?php echo e($m->id); ?>" value="<?php echo e($m->class); ?>">
																		</label>
																	</p>

																	<p class="field-css-url description description-wide">
																		<label for="edit-menu-item-url-<?php echo e($m->id); ?>"> Url
																			<br>
																			<input type="text" id="url_menu_<?php echo e($m->id); ?>" class="widefat code edit-menu-item-url" id="url_menu_<?php echo e($m->id); ?>" value="<?php echo e($m->link); ?>">
																		</label>
																	</p>

																	<?php if(!empty($roles)): ?>
																	<p class="field-css-role description description-wide">
																		<label for="edit-menu-item-role-<?php echo e($m->id); ?>"> Role
																			<br>
																			<select id="role_menu_<?php echo e($m->id); ?>" class="widefat code edit-menu-item-role" name="role_menu_[<?php echo e($m->id); ?>]" >
																				<option value="0">Select Role</option>
																				<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																					<option <?php if($role->id == $m->role_id): ?> selected <?php endif; ?> value="<?php echo e($role->$role_pk); ?>"><?php echo e(ucwords($role->$role_title_field)); ?></option>
																				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																			</select>
																		</label>
																	</p>
																	<?php endif; ?>

																	<p class="field-move hide-if-no-js description description-wide">
																		<label> <span>Move</span> <a href="<?php echo e($currentUrl); ?>" class="menus-move-up" style="display: none;">Move up</a> <a href="<?php echo e($currentUrl); ?>" class="menus-move-down" title="Mover uno abajo" style="display: inline;">Move Down</a> <a href="<?php echo e($currentUrl); ?>" class="menus-move-left" style="display: none;"></a> <a href="<?php echo e($currentUrl); ?>" class="menus-move-right" style="display: none;"></a> <a href="<?php echo e($currentUrl); ?>" class="menus-move-top" style="display: none;">Top</a> </label>
																	</p>

																	<div class="menu-item-actions description-wide submitbox">

																		<a class="item-delete submitdelete deletion" id="delete-<?php echo e($m->id); ?>" href="<?php echo e($currentUrl); ?>?action=delete-menu-item&menu-item=<?php echo e($m->id); ?>&_wpnonce=2844002501">Delete</a>
																		<span class="meta-sep hide-if-no-js"> | </span>
																		<a class="item-cancel submitcancel hide-if-no-js button-secondary" id="cancel-<?php echo e($m->id); ?>" href="<?php echo e($currentUrl); ?>?edit-menu-item=<?php echo e($m->id); ?>&cancel=1424297719#menu-item-settings-<?php echo e($m->id); ?>">Cancel</a>
																		<span class="meta-sep hide-if-no-js"> | </span>
																		<a onclick="getmenus()" class="button button-primary updatemenu" id="update-<?php echo e($m->id); ?>" href="javascript:void(0)">Update item</a>

																	</div>

																</div>
																<ul class="menu-item-transport"></ul>
															</li>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
															<?php endif; ?>
														</ul>
														<div class="menu-settings">

														</div>
													</div>
												</div>
												<div id="nav-menu-footer">
													<div class="major-publishing-actions">

														<?php if(request()->has('action')): ?>
														<div class="publishing-action">
															<a onclick="createnewmenu()" name="save_menu" id="save_menu_header" class="button button-primary menu-save">Create menu</a>
														</div>
														<?php elseif(request()->has("menu")): ?>
														
														<div class="publishing-action">

															<a onclick="getmenus()" name="save_menu" id="save_menu_header" class="button button-primary menu-save">Save menu</a>
															<span class="spinner" id="spincustomu2"></span>
														</div>

														<?php else: ?>
														<div class="publishing-action">
															<a onclick="createnewmenu()" name="save_menu" id="save_menu_header" class="button button-primary menu-save">Create menu</a>
														</div>
														<?php endif; ?>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>

						<div class="clear"></div>
					</div>

					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="clear"></div>
		</div>
	</div>
</div>
<?php /**PATH C:\xampp\htdocs\cartpro_related\3_cartpro_menu\resources\views/vendor/wmenu/menu-html.blade.php ENDPATH**/ ?>