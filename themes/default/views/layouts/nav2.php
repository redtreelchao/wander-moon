
<div id="index_menu">
	<div class="menu2  <?php if($this->menu_tab=='orders'){echo 'active';} ?>">
    	<a href="<?php echo $this->createUrl('site/orders'); ?>">
    	<center><img src="<?php echo $this->_stylePath;?>/images/<?php if($this->menu_tab=='orders'){echo '1_hover.png';}else{echo '1.png';} ?>" width="18px;"/></center>
        <center><h4>我的订单</h4></center>
        </a>
    </div>
    <div class="menu2 <?php if($this->menu_tab=='special'){echo 'active';} ?>">
    	<a href="<?php echo $this->createUrl('site/special',array('id'=>'special')); ?>">
    	<center><img src="<?php echo $this->_stylePath;?>/images/<?php if($this->menu_tab=='special'){echo '2_hover.png';}else{echo '2.png';} ?>" width="18px;"/></center>
        <center><h4>专题活动</h4></center>
        </a>
    </div>
    <div class="menu2 <?php if($this->menu_tab=='contact'){echo 'active';} ?>">
    	<a href="<?php echo $this->createUrl('site/contact'); ?>">
    	<center><img src="<?php echo $this->_stylePath;?>/images/<?php if($this->menu_tab=='contact'){echo '3_hover.png';}else{echo '3.png';} ?>" width="18px;"/></center>
        <center><h4>咨询客服</h4></center>
        </a>
    </div>
</div>
