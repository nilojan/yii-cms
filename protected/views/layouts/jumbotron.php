<?php $this->beginContent('/layouts/main'); ?>
    <div class="container">
        <div class="navbar navbar-inverse">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo Yii::app()->request->baseUrl; ?>">
				<?php echo CHtml::encode(Yii::app()->name); ?></a>
				<?php
	$this->widget('tstranslation.widgets.TsLanguageWidget', array(
		//'template' => '<div class="pull-right frontend-language-widget" >'. {items} .'< /div >',
        'includeBootstrap' => false,
        'type' => 'inline', // defaults uses `inline`
	    'showIsOne' => false,
		//'itemTemplate' => ({$code})
    ));
	

	?>
            </div>
            <div class="navbar-collapse collapse">
                <?php 
				
			$Menu1st = Yii::app()->db->createCommand()->select('*')->from('tbl_menu')->where('status=:su AND level=:su', array(':su'=>1))->queryAll();
			$Menu2nd = Yii::app()->db->createCommand()->select('*')->from('tbl_menu')->where('status=:su AND level=:sux', array(':su'=>1,':sux'=>2))->queryAll();
				/// http://stackoverflow.com/questions/22203445/create-multi-level-menu-using-yii
			if(!empty($Menu1st)): ?>
			<nav id="primary_nav_wrap">
			<ul class="nav navbar-nav" id="yw0">
    	    <?php foreach ($Menu1st as $i=>$list):?>				
				<li>
					<a href="<?php echo Yii::app()->request->baseUrl; ?>/page/page/shortText/<?php echo $list['shortText'];?>"><?php echo $list['Title'];?></a>
							<?php if(!empty($Menu2nd)): ?>
							<ul>
							<?php foreach ($Menu2nd as $l=>$listl):?>				
									<?php if($listl['parent_id']==$list['id']): ?>
									<li>
										<a href="<?php echo Yii::app()->request->baseUrl; ?>/page/page/shortText/<?php echo $listl['shortText'];?>"><?php echo $listl['Title'];?></a>
									</li>
									<?php endif;?>					
							<?php endforeach;?>
							</ul>
							<?php endif;?>	
				</li>
			<?php endforeach;?>
			</ul>
			</nav>
        	<?php endif;?>				

                <?php if (!app()->user->isGuest): ?>
                    <div class=" navbar-right">
                        <span class="navbar-brand"><small>Welcome,<?php echo app()->user->name; ?></small></span>
						<span class="navbar-brand">
                                <a class="navbar-right" href="<?php echo $this->createUrl('site/logout') ?>">
                                    <small>Logout</small>
                                </a></span>
						<span class="navbar-brand">
                                <a class="navbar-right" href="<?php echo $this->createUrl('admin/dashboard') ?>">
                                    <small>Dashboard</small>
                                </a></span>								
                    </div>
                <?php endif;?>
            </div>
            <!--/.navbar-collapse -->
        </div>
        
    <!--/.navbar -->
	
	
	
	
	

        <?php
        $flashMessages = Yii::app()->user->getFlashes();
        if ($flashMessages) :?>
            <?php foreach ($flashMessages as $key => $message)  : ?>
                <div class="alert alert-dismissable alert-<?php echo $key; ?>">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong><?php echo   $message;?></strong>
                </div>
            <?php endforeach; ?>
        <?php endif;?>
		
		
		<?php 
		/*
		$this->widget('tstranslation.widgets.TsLanguageWidget', array(
        'includeBootstrap' => false, // if you want to use 'dropdown' type in your project and bootstrap.js not loaded
        'type' => 'dropdown', // defaults uses `inline`
		));*/
		?>
        <div class="row" style="padding:3%;"><?php  echo $content; ?></div>
        <hr>
		
		<?php if (app()->user->isGuest && Yii::app()->config->get('slider_on_off')==1): ?>

		<div class="container-fluid">

		<?php $Slider = Yii::app()->db->createCommand()->select('*')->from('tbl_slider')->where('status=:su', array(':su'=>1))->queryAll(); ?>
		<?php if(!empty($Slider)): ?>
			<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jssor.js"></script>
			<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jssor.slider.js"></script>
			<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jssor-settings.js"></script>

        <div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 100%; height: 240px; overflow: hidden;">

	
		<div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 100%; height: 240px; overflow: hidden;">

                  <?php foreach ($Slider as $k=>$linkk):?>
				  <div class="sliderImage"><img u="image" src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/300/<?php echo $linkk['imageName']; ?>" /><span class="sliderCaption"><?php echo $linkk['title']; ?><span></div>
				  <?php endforeach;?>
        </div>


			<!-- bullet navigator container -->
			<div u="navigator" class="jssorb03" style="bottom: 4px; right: 6px;">
				<!-- bullet navigator item prototype -->
				<div u="prototype"><div u="numbertemplate"></div></div>
			</div>

			<span u="arrowleft" class="jssora03l" style="top: 90px; left: -12px;">
			</span>
			<!-- Arrow Right -->
			<span u="arrowright" class="jssora03r" style="top: 90px; right: -12px;">
			</span>
		</div>


		
		<?php endif;?>
		</div>
		
		<?php endif;?>
		
		<div class="row footer" style="padding:1%;">		
		<?php if(!empty($Menu1st)): ?>
		<?php foreach ($Menu1st as $i=>$list):?>
			<div class="col-lg-3">
				<h4><a href="<?php echo Yii::app()->request->baseUrl; ?>/page/page/shortText/<?php echo $list['shortText'];?>"><?php echo $list['Title']; ?></a></h4>
			<?php if(!empty($Menu2nd)): ?>
			<ul class="footerMenu">
    	    <?php foreach ($Menu2nd as $l=>$listl):?>				
					<?php if($listl['parent_id']==$list['id']): ?>
					<li class="list-group-item">
						<a href="<?php echo Yii::app()->request->baseUrl; ?>/page/page/shortText/<?php echo $listl['shortText'];?>"><?php echo $listl['Title'];?></a>
					</li>
					<?php endif;?>					
			<?php endforeach;?>
			</ul>
        	<?php endif;?>	
			</div>
		<?php endforeach; ?>
		<?php endif;?>	
		</div>


		
        <footer style="padding:1%;">
            <p>&copy; <?php echo CHtml::encode(Yii::app()->name); ?> <?php echo date('Y'); ?></p>
        </footer>
    </div> <!-- /container -->
<?php $this->endContent(); ?>