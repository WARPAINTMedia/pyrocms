<?php echo form_open($this->uri->uri_string(), 'class="crud"'); ?>
<?php echo form_hidden('parent_id', @$page->parent_id); ?>

<div class="box">

	<?php if($method == 'create'): ?>
		<h3><?php echo lang('page_create_title');?></h3>
	<?php else: ?>
		<h3><?php echo sprintf(lang('page_edit_title'), $page->title);?></h3>
	<?php endif; ?>
	
	<div class="box-container">	
	
		<div class="tabs">
		
			<ul class="tab-menu">
				<li><a href="#page-content"><span><?php echo lang('page_content_label');?></span></a></li>
				<li><a href="#page-design"><span><?php echo lang('page_design_label');?></span></a></li>
				<li><a href="#page-meta"><span><?php echo lang('page_meta_label');?></span></a></li>
			</ul>
			
			<div id="page-content">
			
				<fieldset>
					<ol>

						<li class="even">
							<label for="title"><?php echo lang('page_title_label');?></label>
							<?php echo form_input('title', $page->title, 'maxlength="60"'); ?>
						</li>
						
						<li>
							<label for="slug"><?php echo lang('page_slug_label');?></label>
							
							<?php if(!empty($page->parent_id)): ?>
								<?php echo site_url().$parent_page->path; ?>/
							<?php else: ?>
								<?php echo site_url(); ?>
							<?php endif; ?>
							
							<?php if($this->uri->segment(3,'') == 'edit'): ?>
								<?php echo form_hidden('old_slug', $page->slug); ?>
							<?php endif; ?>
							
							<?php echo form_input('slug', $page->slug, 'maxlength="60" size="20" class="width-10"'); ?>
							
							<?php echo $this->config->item('url_suffix'); ?>
						</li>
						
						<li class="even">
							<label for="category_id"><?php echo lang('page_status_label');?></label>
							<?php echo form_dropdown('status', array('draft'=>lang('page_draft_label'), 'live'=>lang('page_live_label')), $page->status) ?>	
						</li>
						
						<li>
							<?php echo form_textarea(array('id'=>'body', 'name'=>'body', 'value' => stripslashes($page->body), 'rows' => 50, 'class'=>'wysiwyg-advanced')); ?>
						</li>
					</ol>
				</fieldset>

			</div>
		
			<!-- Design tab -->
			<div id="page-design">
			
				<fieldset>
					
					<ol>
						<li class="even">
							<label for="layout_id"><?php echo lang('page_layout_id_label');?></label>
							<?php echo form_dropdown('layout_id', $page_layouts, $page->layout_id); ?>
						</li>
						
						<li>
							<label for="css" class="clear-left"><?php echo lang('page_css_label');?></label>
							<?php echo form_textarea('css', $page->css, 'id="css_editor"'); ?>
						</li>
					</ol>
					
				</fieldset>
				
			</div>
			
			<!-- Meta data tab -->
			<div id="page-meta">
			
				<fieldset>
					<ol>
						<li class="even">
							<label for="meta_title"><?php echo lang('page_meta_title_label');?></label>
							<input type="text" id="meta_title" name="meta_title" maxlength="255" value="<?php echo $page->meta_title; ?>" />
						</li>
						<li>
							<label for="meta_keywords"><?php echo lang('page_meta_keywords_label');?></label>
							<input type="text" id="meta_keywords" name="meta_keywords" maxlength="255" value="<?php echo $page->meta_keywords; ?>" />
						</li>
						<li class="even">
							<label for="meta_description"><?php echo lang('page_meta_desc_label');?></label>
							<textarea id="meta_description" name="meta_description"><?php echo $page->meta_description; ?></textarea>
						</li>
					</ol>
				</fieldset>
				
			</div>
			
		</div>

		<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )); ?>

	</div>
</div>

<?php echo form_close(); ?>

<script type="text/javascript">
	css_editor('css_editor', "41.6em");
</script>