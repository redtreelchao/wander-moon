<?php if(Yii::app()->session['is_login']!=1):?>
<div style="height:50px; width:100%"></div>
<div id="bottomhint">
        <p class="box_center2">
             <a href="<?php echo $this->createUrl('user/login'); ?>" class="btn_f1">登录</a>
             <a href="<?php echo $this->createUrl('user/join'); ?>" class="btn_f3">注册会员</a>
         </p>
</div>
<?php endif; ?>