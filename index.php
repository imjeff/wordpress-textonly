<?php
/**
 * Text Only 为纯文本极简主题，黑白配色，对程序极简优化，主题无 JS 和图片文件载入。主题支持自定义背景、自定义菜单，保留搜索及评论功能；内置文章归档和搜索模板；已作中文字体优化，内置3种字体方案可选。<br/>
 * 发布页：<a href="https://yayu.net/projects/typecho-textonly" target="_blank">https://yayu.net/projects/typecho-textonly</a>
 *
 * @package Text Only
 * @author Jeff Chen
 * @version 1.0.2
 * @link https://yayu.net/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php'); ?>
<?php if ($this->is('archive')) { ?>
<div class="crumb"><strong>" <?php $this->archiveTitle(['category' => _t('%s'),'search' => _t('搜索结果'),'tag' => _t('标签：%s'),'author' => _t('作者：%s')], '', ''); ?> "</strong><?php if ( $this->is('search') ) { ?>关键词：<?php echo $this->archiveTitle('','',''); ?><?php } else { ?> 下的文章<?php } ?></div>
<?php } ?>
<?php if ($this->have()): ?>
<?php while ($this->next()): ?>
<article>
<h2 class="title"><a href="<?php $this->permalink(); ?>"><?php $this->title(); ?></a></h2>
<?php $this->category(",", true, "无"); echo " &middot; ";?><time datetime="<?php $this->date(); ?>"><?php $this->date(); ?></time>
<div class="desc"><?php $this->excerpt(110, " ..."); ?></div>
</article>
<?php endwhile; ?>
<?php if ( $this->is('archive') || $this->is('index') ) { ?>
<div class="post-pagination">
<?php $this->pageNav('&nbsp;←&nbsp;', '&nbsp;→&nbsp;', '5', '…'); ?>
</div>
<?php }; ?>
<?php else : ?><article><em>空空如也 ...</em></article><?php endif; ?>
<?php $this->need('footer.php'); ?>