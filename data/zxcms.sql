/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : zxcms80

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-04-06 08:41:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `zx_admin`
-- ----------------------------
DROP TABLE IF EXISTS `zx_admin`;
CREATE TABLE `zx_admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `adminname` varchar(50) DEFAULT NULL COMMENT '用户名',
  `password` varchar(32) DEFAULT NULL COMMENT '密码',
  `groupid` int(11) DEFAULT NULL COMMENT '分组id',
  `penname` varchar(50) DEFAULT NULL COMMENT '笔名(用于发布内容处的作者)',
  `logincount` int(11) DEFAULT '0' COMMENT '登陆次数',
  `islock` tinyint(2) DEFAULT '1' COMMENT '状态：1正常0锁死',
  `lastlogintime` int(11) DEFAULT NULL COMMENT '最后登陆时间',
  `lastloginip` varchar(50) DEFAULT NULL COMMENT '最后登陆ip',
  `openid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员';

-- ----------------------------
-- Records of zx_admin
-- ----------------------------
INSERT INTO `zx_admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '', '9', '1', '1459835696', '112.253.25.234', '0');

-- ----------------------------
-- Table structure for `zx_admin_group`
-- ----------------------------
DROP TABLE IF EXISTS `zx_admin_group`;
CREATE TABLE `zx_admin_group` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `groupname` varchar(50) DEFAULT NULL COMMENT '角色名称',
  `groupdesc` varchar(255) DEFAULT NULL COMMENT '角色描述',
  `pagelever` varchar(100) DEFAULT NULL COMMENT '页面权限',
  `catearray` varchar(100) DEFAULT NULL COMMENT '栏目选择',
  `catelever` varchar(100) DEFAULT NULL COMMENT ' 栏目权限',
  `createdate` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='角色分组';

-- ----------------------------
-- Records of zx_admin_group
-- ----------------------------
INSERT INTO `zx_admin_group` VALUES ('1', '超级管理员', '', '1,2,3,4,5,8,9,10,11,15,16,17,19,18,32,21,24,33,34,35,42,46,50,51', '', '', '1111111111');

-- ----------------------------
-- Table structure for `zx_admin_menu`
-- ----------------------------
DROP TABLE IF EXISTS `zx_admin_menu`;
CREATE TABLE `zx_admin_menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL COMMENT '标题',
  `url` varchar(50) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `menuid` int(11) DEFAULT NULL,
  `ordnum` int(4) DEFAULT NULL COMMENT '排序',
  `islock` tinyint(2) DEFAULT '1' COMMENT '状态1正常0锁定',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COMMENT='菜单、权限列表';

-- ----------------------------
-- Records of zx_admin_menu
-- ----------------------------
INSERT INTO `zx_admin_menu` VALUES ('1', '设置', '', '0', '1', '1', '1');
INSERT INTO `zx_admin_menu` VALUES ('2', '栏目', '', '0', '2', '2', '1');
INSERT INTO `zx_admin_menu` VALUES ('3', '内容', '', '0', '3', '3', '1');
INSERT INTO `zx_admin_menu` VALUES ('4', '会员', null, '0', '4', '4', '1');
INSERT INTO `zx_admin_menu` VALUES ('5', '扩展', '', '0', '5', '6', '1');
INSERT INTO `zx_admin_menu` VALUES ('8', '生成', '', '0', '8', '9', '1');
INSERT INTO `zx_admin_menu` VALUES ('9', '站点设置', 'Setting/index', '1', '9', '1', '1');
INSERT INTO `zx_admin_menu` VALUES ('10', '优化设置', 'Setting/seoSetting', '1', '10', '3', '1');
INSERT INTO `zx_admin_menu` VALUES ('11', '上传设置', 'Setting/uploadSetting', '1', '11', '4', '1');
INSERT INTO `zx_admin_menu` VALUES ('15', '生成设置', 'Setting/htmlSetting', '1', '15', '6', '1');
INSERT INTO `zx_admin_menu` VALUES ('16', '管理员管理', 'Setting/adminList', '1', '16', '7', '1');
INSERT INTO `zx_admin_menu` VALUES ('17', '角色管理', 'Setting/groupList', '1', '17', '8', '1');
INSERT INTO `zx_admin_menu` VALUES ('18', '模型管理', 'Model/index', '2', '18', '2', '1');
INSERT INTO `zx_admin_menu` VALUES ('19', '栏目管理', 'Category/index', '2', '19', '1', '1');
INSERT INTO `zx_admin_menu` VALUES ('20', '投稿管理', '', '3', '20', '4', '0');
INSERT INTO `zx_admin_menu` VALUES ('21', '回收站', 'Content/recycle', '3', '21', '4', '1');
INSERT INTO `zx_admin_menu` VALUES ('22', '会员设置', '', '4', '22', '1', '0');
INSERT INTO `zx_admin_menu` VALUES ('23', '会员组管理', '', '4', '23', '2', '0');
INSERT INTO `zx_admin_menu` VALUES ('24', '会员管理', 'Member/Index', '4', '24', '3', '1');
INSERT INTO `zx_admin_menu` VALUES ('25', '财务管理', '', '4', '25', '4', '0');
INSERT INTO `zx_admin_menu` VALUES ('26', '积分策略', '', '4', '26', '5', '0');
INSERT INTO `zx_admin_menu` VALUES ('27', '积分管理', '', '4', '27', '6', '0');
INSERT INTO `zx_admin_menu` VALUES ('28', '消息管理', '', '4', '28', '7', '0');
INSERT INTO `zx_admin_menu` VALUES ('32', '区块管理', 'Block/index', '3', '32', '2', '1');
INSERT INTO `zx_admin_menu` VALUES ('33', '友情链接', 'Expand/Link', '5', '33', '1', '1');
INSERT INTO `zx_admin_menu` VALUES ('34', '留言管理', 'Book/Index', '5', '34', '2', '1');
INSERT INTO `zx_admin_menu` VALUES ('35', '评论管理', 'Comment/Index', '5', '35', '3', '1');
INSERT INTO `zx_admin_menu` VALUES ('42', '生成首页', 'Create/index', '8', '42', '1', '1');
INSERT INTO `zx_admin_menu` VALUES ('43', '生成栏目', '', '8', '43', '2', '0');
INSERT INTO `zx_admin_menu` VALUES ('44', '生成内容', '', '8', '44', '3', '0');
INSERT INTO `zx_admin_menu` VALUES ('45', '生成地图', '', '8', '45', '4', '0');
INSERT INTO `zx_admin_menu` VALUES ('46', '一键生成', 'Create/all', '8', '46', '5', '1');
INSERT INTO `zx_admin_menu` VALUES ('47', '快捷登录', '', '4', '47', '8', '0');
INSERT INTO `zx_admin_menu` VALUES ('48', '充值接口', '', '4', '48', '9', '0');
INSERT INTO `zx_admin_menu` VALUES ('49', '表单管理', '', '2', '49', '3', '0');
INSERT INTO `zx_admin_menu` VALUES ('50', '内容列表', 'Content/index', '3', '50', '1', '1');
INSERT INTO `zx_admin_menu` VALUES ('51', '素材管理', 'Attachment/index', '3', '51', '3', '1');

-- ----------------------------
-- Table structure for `zx_attachment`
-- ----------------------------
DROP TABLE IF EXISTS `zx_attachment`;
CREATE TABLE `zx_attachment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(2) DEFAULT NULL COMMENT '文件类型1图片2视频3文件',
  `path` varchar(50) DEFAULT NULL COMMENT '保存路径',
  `fileext` varchar(5) DEFAULT NULL COMMENT '文件后缀',
  `name` varchar(255) DEFAULT NULL COMMENT '文件原名称',
  `url` varchar(100) DEFAULT NULL,
  `time` int(11) DEFAULT NULL COMMENT '上传时间',
  `md5` varchar(32) DEFAULT NULL,
  `sha1` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='上传文件';

-- ----------------------------
-- Records of zx_attachment
-- ----------------------------

-- ----------------------------
-- Table structure for `zx_block`
-- ----------------------------
DROP TABLE IF EXISTS `zx_block`;
CREATE TABLE `zx_block` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL COMMENT '区块名称',
  `desc` varchar(100) DEFAULT NULL COMMENT '区块说明',
  `content` text COMMENT '区块内容',
  `createtime` int(11) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='区块表';

-- ----------------------------
-- Records of zx_block
-- ----------------------------
INSERT INTO `zx_block` VALUES ('1', 'contact', '联系方式', '<p>山东营赢信息技术有限公司</p>联系人：张先生<br />电　话：0536-8101392<br />手　机：15650255351<br />邮　箱：wfzhangmingming@winbywin.com<br />地　址：潍坊市胜利西街136号金艺大厦7F', '1458791815', '1458791815');
INSERT INTO `zx_block` VALUES ('2', 'about', '关于我们', '山东营赢信息技术有限公司[3] 是一家专业从事移动互联网营销平台的企业，专注于为广大企业提供移动营销渠道，帮助企业实现O2O，移动电商，轻应用等多层面开发。目前，解决方案和服务已经应用于多家中小企业，信息惠及到广泛的移动端用户。 自2013年11月发展至今，营赢的产品研发团队中拥有多位行业尖端技术工程师， 技术骨干在阿里和百度等知名企业研究iOS系统和Android系统多年。 营赢建站包含了手机网站、PC网站建设、微网站建设。公司拥有一站式建站系统，帮助客户搭建企业各类网站平台，并提供建前指导、建后维护。', '1458791821', '1458791821');

-- ----------------------------
-- Table structure for `zx_category`
-- ----------------------------
DROP TABLE IF EXISTS `zx_category`;
CREATE TABLE `zx_category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL COMMENT '父id',
  `catename` varchar(255) DEFAULT NULL COMMENT '栏目名称',
  `catedir` varchar(255) DEFAULT NULL COMMENT '英文目录',
  `sonid` varchar(255) DEFAULT NULL COMMENT '所有子孙id',
  `ordnum` int(11) DEFAULT '0' COMMENT '排序',
  `ismenu` tinyint(2) DEFAULT '0' COMMENT '属性设置是否导航显示1是0否',
  `catepicid` int(11) DEFAULT NULL COMMENT '栏目图片',
  `seotitle` varchar(255) DEFAULT NULL COMMENT '优化标题',
  `catekey` varchar(255) DEFAULT NULL COMMENT 'HTML头部的Meta关键字',
  `catedesc` varchar(255) DEFAULT NULL COMMENT 'HTML头部的Meta站点描述信息',
  `cateurl` varchar(255) DEFAULT NULL COMMENT '链接地址(外部链接)',
  `modelid` int(11) DEFAULT '-1' COMMENT '模型id',
  `pagenum` int(11) DEFAULT NULL COMMENT '分页',
  `cate_list` varchar(100) DEFAULT NULL COMMENT '列表模板',
  `cate_show` varchar(100) DEFAULT NULL COMMENT '内容模板',
  `urlrule` varchar(20) DEFAULT NULL COMMENT '内容页规则(静态模式下使用)',
  `domain` varchar(255) DEFAULT NULL,
  `allowpost` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='栏目表';

-- ----------------------------
-- Records of zx_category
-- ----------------------------
INSERT INTO `zx_category` VALUES ('1', '0', '公司新闻', '', null, '0', '1', '0', '', '', '', null, '1', '20', '', '', 'id', null, null);
INSERT INTO `zx_category` VALUES ('2', '0', '产品展示', '', '5,6', '0', '1', '0', '', '', '', null, '2', '20', '', '', 'id', null, null);
INSERT INTO `zx_category` VALUES ('3', '0', '加入我们', '', null, '0', '1', '0', '', '', '', null, '3', '20', '', '', 'id', null, null);
INSERT INTO `zx_category` VALUES ('4', '9', '企业视频', '', null, '0', '1', '0', '', '', '', null, '4', '20', '', '', 'id', null, null);
INSERT INTO `zx_category` VALUES ('5', '2', 'A系列', '', null, '0', '1', '0', '', '', '', null, '2', '20', '', '', 'id', null, null);
INSERT INTO `zx_category` VALUES ('6', '2', 'B系列', '', null, '0', '1', '0', '', '', '', null, '2', '20', '', '', 'id', null, null);
INSERT INTO `zx_category` VALUES ('7', '0', '在线留言', null, null, '0', '1', '0', null, null, null, 'Book/index', '-2', null, null, null, null, null, null);
INSERT INTO `zx_category` VALUES ('8', '9', '关于我们', '', null, '0', '1', '0', '', '', '', null, '-1', null, null, '', null, null, null);
INSERT INTO `zx_category` VALUES ('9', '0', '企业文化', '', '4,8', '0', '1', '0', '', '', '', null, '-1', null, null, '', null, null, null);

-- ----------------------------
-- Table structure for `zx_config`
-- ----------------------------
DROP TABLE IF EXISTS `zx_config`;
CREATE TABLE `zx_config` (
  `setname` varchar(30) DEFAULT NULL,
  `setkey` varchar(30) DEFAULT NULL,
  `setvalue` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='配置';

-- ----------------------------
-- Records of zx_config
-- ----------------------------
INSERT INTO `zx_config` VALUES ('site', 'webname', '山东营赢信息技术有限公司');
INSERT INTO `zx_config` VALUES ('site', 'webmode', '0');
INSERT INTO `zx_config` VALUES ('site', 'isgzip', '1');
INSERT INTO `zx_config` VALUES ('site', 'iscache', '0');
INSERT INTO `zx_config` VALUES ('site', 'cachedate', '60');
INSERT INTO `zx_config` VALUES ('site', 'webicp', '');
INSERT INTO `zx_config` VALUES ('site', 'webcount', '');
INSERT INTO `zx_config` VALUES ('seo', 'seotitle', '');
INSERT INTO `zx_config` VALUES ('seo', 'seokey', '');
INSERT INTO `zx_config` VALUES ('seo', 'seodesc', '');
INSERT INTO `zx_config` VALUES ('upload', 'upmaxsize', '2048');
INSERT INTO `zx_config` VALUES ('upload', 'uptype_pic', 'gif|jpg|png');
INSERT INTO `zx_config` VALUES ('site', 'tempcache', '1');
INSERT INTO `zx_config` VALUES ('upload', 'uptype_video', 'swf|flv|mp4');
INSERT INTO `zx_config` VALUES ('upload', 'uptype_file', 'zip|rar|7z|doc|docx|ppt|pptx|xls|xls|pdf');
INSERT INTO `zx_config` VALUES ('html', 'htmldir', 'html/');
INSERT INTO `zx_config` VALUES ('html', 'htmlhome', '1');
INSERT INTO `zx_config` VALUES ('html', 'htmlclass', '1');
INSERT INTO `zx_config` VALUES ('html', 'htmlcontent', '0');
INSERT INTO `zx_config` VALUES ('html', 'htmltotal', '5');
INSERT INTO `zx_config` VALUES ('expand', 'bookopen', '0');
INSERT INTO `zx_config` VALUES ('expand', 'commentopen', '1');
INSERT INTO `zx_config` VALUES ('expand', 'bookcheck', '1');
INSERT INTO `zx_config` VALUES ('expand', 'commentcheck', '0');
INSERT INTO `zx_config` VALUES ('other', 'verify', '');

-- ----------------------------
-- Table structure for `zx_content`
-- ----------------------------
DROP TABLE IF EXISTS `zx_content`;
CREATE TABLE `zx_content` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `categoryid` int(11) DEFAULT NULL COMMENT 'category表id--栏目id',
  `ordnum` int(11) DEFAULT '0' COMMENT '排序',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `createtime` int(11) DEFAULT NULL COMMENT '创建时间',
  `lastuptime` int(11) DEFAULT NULL COMMENT '最后更新时间',
  `author` varchar(50) DEFAULT NULL COMMENT '作者',
  `comefrom` varchar(10) DEFAULT NULL COMMENT '来源',
  `hits` int(11) DEFAULT '0' COMMENT '浏览次数 人气',
  `style` varchar(255) DEFAULT NULL COMMENT '标题样式',
  `picid` int(11) DEFAULT NULL COMMENT '缩放图图片id',
  `ispic` tinyint(2) DEFAULT '0' COMMENT '是否有缩放图',
  `url` varchar(100) DEFAULT NULL COMMENT 'url地址',
  `isurl` tinyint(2) DEFAULT '0' COMMENT ' 是否外链',
  `keyword` varchar(255) DEFAULT NULL COMMENT 'seo关键词',
  `description` varchar(255) DEFAULT NULL COMMENT 'seo简介',
  `intro` varchar(255) DEFAULT NULL COMMENT '简介',
  `islock` tinyint(2) DEFAULT '1' COMMENT '状态1发布0未发布-1删除',
  `isnice` tinyint(1) DEFAULT '0' COMMENT '是否推荐',
  `ontop` tinyint(2) DEFAULT '0' COMMENT '置顶',
  `iscomment` tinyint(2) DEFAULT '0' COMMENT '是否可被评论',
  `comments` int(11) DEFAULT '0' COMMENT '评论条数',
  `tags` varchar(255) DEFAULT NULL,
  `isact` tinyint(2) DEFAULT NULL,
  `likeid` varchar(255) DEFAULT NULL,
  `adminid` varchar(255) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `point` varchar(255) DEFAULT NULL,
  `isauto` tinyint(2) DEFAULT NULL COMMENT ' 是否定时发布',
  `autotime` int(11) DEFAULT NULL COMMENT '定时发布时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='栏目内容表';

-- ----------------------------
-- Records of zx_content
-- ----------------------------

-- ----------------------------
-- Table structure for `zx_expand_book`
-- ----------------------------
DROP TABLE IF EXISTS `zx_expand_book`;
CREATE TABLE `zx_expand_book` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL COMMENT '昵称',
  `sex` tinyint(2) DEFAULT NULL COMMENT '性别0保密1男2女',
  `tel` varchar(20) DEFAULT NULL COMMENT '联系电话',
  `content` varchar(255) DEFAULT NULL COMMENT '留言内容',
  `reply` varchar(255) DEFAULT NULL COMMENT '回复内容',
  `createtime` int(11) DEFAULT NULL COMMENT '留言时间',
  `replytime` int(11) DEFAULT NULL COMMENT '回复时间',
  `islock` tinyint(2) DEFAULT '1' COMMENT '是否审核通过1通过0未通过',
  `postip` varchar(20) DEFAULT NULL COMMENT '留言者ip',
  `isseen` tinyint(2) DEFAULT '1' COMMENT '1未删除0已删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='留言表';

-- ----------------------------
-- Records of zx_expand_book
-- ----------------------------

-- ----------------------------
-- Table structure for `zx_expand_class`
-- ----------------------------
DROP TABLE IF EXISTS `zx_expand_class`;
CREATE TABLE `zx_expand_class` (
  `classid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `classname` varchar(50) DEFAULT NULL COMMENT '类别名称',
  `pid` int(11) DEFAULT '1' COMMENT '父分类',
  `ordnum` int(4) DEFAULT NULL COMMENT '排序',
  `isseen` tinyint(2) DEFAULT '1' COMMENT '1未删除0已删除',
  PRIMARY KEY (`classid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='友情链接分类';

-- ----------------------------
-- Records of zx_expand_class
-- ----------------------------

-- ----------------------------
-- Table structure for `zx_expand_comment`
-- ----------------------------
DROP TABLE IF EXISTS `zx_expand_comment`;
CREATE TABLE `zx_expand_comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `contentid` int(11) DEFAULT NULL COMMENT 'content表id',
  `username` varchar(255) DEFAULT NULL COMMENT '昵称',
  `content` varchar(255) DEFAULT NULL COMMENT '评价内容',
  `reply` varchar(255) DEFAULT NULL COMMENT '回复内容',
  `createtime` int(11) DEFAULT NULL COMMENT '评价时间',
  `replytime` int(11) DEFAULT NULL COMMENT '回复时间',
  `islock` tinyint(2) DEFAULT '1' COMMENT '是否通过审核',
  `pid` int(11) DEFAULT '0' COMMENT '继承、跟随哪个id( 父id)',
  `postip` varchar(30) DEFAULT NULL COMMENT '评价人ip地址',
  `isseen` tinyint(2) DEFAULT '1' COMMENT '1未删除0已删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='评论表';

-- ----------------------------
-- Records of zx_expand_comment
-- ----------------------------

-- ----------------------------
-- Table structure for `zx_expand_link`
-- ----------------------------
DROP TABLE IF EXISTS `zx_expand_link`;
CREATE TABLE `zx_expand_link` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `webname` varchar(50) DEFAULT NULL COMMENT '网站名称',
  `weburl` varchar(100) DEFAULT NULL COMMENT '网站域名',
  `weblogoid` int(11) DEFAULT NULL COMMENT '网站logoid对应attachement表',
  `islogo` tinyint(2) DEFAULT NULL COMMENT '是否有logo、0无1有',
  `classid` int(11) DEFAULT NULL COMMENT '类别id',
  `islock` tinyint(2) DEFAULT '0' COMMENT '是否审核通过1通过0未通过',
  `isseen` tinyint(2) DEFAULT '1' COMMENT '0已删除1未删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='友情链接';

-- ----------------------------
-- Records of zx_expand_link
-- ----------------------------

-- ----------------------------
-- Table structure for `zx_member`
-- ----------------------------
DROP TABLE IF EXISTS `zx_member`;
CREATE TABLE `zx_member` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL COMMENT '用户名',
  `userpass` varchar(32) DEFAULT NULL COMMENT '密码',
  `penname` varchar(50) DEFAULT NULL COMMENT '笔名(用于发布内容处的作者)',
  `birthday` int(11) DEFAULT NULL COMMENT '出生日期',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `telephone` varchar(15) DEFAULT NULL COMMENT '手机号',
  `sex` tinyint(2) DEFAULT NULL COMMENT '性别：0男1女-1保密',
  `prov` varchar(20) DEFAULT NULL COMMENT '省',
  `city` varchar(20) DEFAULT NULL COMMENT '市',
  `dist` varchar(20) DEFAULT NULL COMMENT '区',
  `regtime` varchar(11) DEFAULT NULL COMMENT '注册日期',
  `regip` varchar(50) DEFAULT NULL COMMENT '注册ip',
  `logincount` int(11) DEFAULT NULL COMMENT '登录次数',
  `islock` tinyint(2) DEFAULT '1' COMMENT '状态：0锁定、1正常',
  `lastlogintime` int(11) DEFAULT NULL COMMENT '最后登录时间',
  `lastloginip` varchar(50) DEFAULT NULL COMMENT '最后登录ip',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员';

-- ----------------------------
-- Records of zx_member
-- ----------------------------

-- ----------------------------
-- Table structure for `zx_model`
-- ----------------------------
DROP TABLE IF EXISTS `zx_model`;
CREATE TABLE `zx_model` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `modelname` varchar(30) DEFAULT NULL COMMENT '模型名称',
  `tablename` varchar(50) DEFAULT NULL COMMENT '数据表名',
  `modeldesc` varchar(50) DEFAULT NULL COMMENT '模型描述',
  `islock` tinyint(2) DEFAULT '0',
  `list_temp` varchar(255) DEFAULT NULL COMMENT '前台列表模板',
  `show_temp` varchar(255) DEFAULT NULL COMMENT '前台内容模板',
  `admin_edit_temp` varchar(255) DEFAULT NULL COMMENT '后台修改模板',
  `config` varchar(30) DEFAULT NULL COMMENT '配置',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='模型表';

-- ----------------------------
-- Records of zx_model
-- ----------------------------
INSERT INTO `zx_model` VALUES ('1', ' 文章模型', 'zx_model_news', '', '1', 'news/list.html', 'news/info.html', 'module/model_news/edit.html', 'news');
INSERT INTO `zx_model` VALUES ('2', '产品模型', 'zx_model_pro', '', '1', 'pro/list.html', 'pro/info.html', 'module/model_pro/edit.html', 'pro');
INSERT INTO `zx_model` VALUES ('3', '招聘模型', 'zx_model_job', '', '1', 'job/list.html', 'job/info.html', 'module/model_job/edit.html', 'job');
INSERT INTO `zx_model` VALUES ('4', '视频模型', 'zx_model_video', '', '1', 'video/list.html', 'video/info.html', 'module/model_video/edit.html', 'video');

-- ----------------------------
-- Table structure for `zx_model_field`
-- ----------------------------
DROP TABLE IF EXISTS `zx_model_field`;
CREATE TABLE `zx_model_field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modelid` int(11) DEFAULT NULL COMMENT '模型id',
  `fname` varchar(255) DEFAULT NULL COMMENT '字段名字',
  `falias` varchar(255) DEFAULT NULL COMMENT '字段别名',
  `fclass` tinyint(4) DEFAULT '0' COMMENT '字段类型1单行文本框2多行文本框3下拉列表4单选按钮5复选框6HTML编辑器',
  `fmode` tinyint(4) DEFAULT '0' COMMENT '表现形式1普通文本2整数4上传5小数',
  `fdatatype` tinyint(4) DEFAULT '0' COMMENT '数据类型1文本2数字3货币5备注',
  `flength` varchar(100) DEFAULT '0' COMMENT '字段长度',
  `fdefault` varchar(255) DEFAULT NULL COMMENT '默认值',
  `foptions` text COMMENT '列表内容',
  `fismust` tinyint(2) DEFAULT '0' COMMENT '是否必填',
  `frules` tinyint(4) DEFAULT '0' COMMENT '验证规则1不为空2整数3小数4电话5手机6邮箱8邮编9QQ10网址',
  `fistrim` tinyint(2) DEFAULT '0' COMMENT '去掉两端空格',
  `fupload` tinyint(10) DEFAULT '0' COMMENT '上传类型1图片2附件3视频4全部类型5Flash',
  `ordnum` int(11) DEFAULT '0' COMMENT '排序',
  `islock` tinyint(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='模型新添加字段表';

-- ----------------------------
-- Records of zx_model_field
-- ----------------------------

-- ----------------------------
-- Table structure for `zx_model_job`
-- ----------------------------
DROP TABLE IF EXISTS `zx_model_job`;
CREATE TABLE `zx_model_job` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL COMMENT 'content表id',
  `neednum` int(11) DEFAULT NULL COMMENT '招聘人数',
  `workspace` varchar(50) DEFAULT NULL COMMENT '工作地点',
  `workduty` text COMMENT '工作职责',
  `content` text COMMENT '岗位要求',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zx_model_job
-- ----------------------------

-- ----------------------------
-- Table structure for `zx_model_news`
-- ----------------------------
DROP TABLE IF EXISTS `zx_model_news`;
CREATE TABLE `zx_model_news` (
  `newsid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL COMMENT 'content表id',
  `content` text COMMENT '内容详情',
  PRIMARY KEY (`newsid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zx_model_news
-- ----------------------------

-- ----------------------------
-- Table structure for `zx_model_page`
-- ----------------------------
DROP TABLE IF EXISTS `zx_model_page`;
CREATE TABLE `zx_model_page` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL COMMENT 'category表id',
  `content` text COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='单网页';

-- ----------------------------
-- Records of zx_model_page
-- ----------------------------

-- ----------------------------
-- Table structure for `zx_model_pro`
-- ----------------------------
DROP TABLE IF EXISTS `zx_model_pro`;
CREATE TABLE `zx_model_pro` (
  `proid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL COMMENT 'content表id',
  `prono` varchar(255) DEFAULT NULL COMMENT '产品编号',
  `promode` varchar(255) DEFAULT NULL COMMENT '产品型号',
  `piclist` varchar(255) DEFAULT NULL COMMENT '图片列表',
  `content` text COMMENT '产品介绍',
  `introduction` text COMMENT '简介',
  PRIMARY KEY (`proid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zx_model_pro
-- ----------------------------

-- ----------------------------
-- Table structure for `zx_model_video`
-- ----------------------------
DROP TABLE IF EXISTS `zx_model_video`;
CREATE TABLE `zx_model_video` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL COMMENT 'content表id',
  `videoid` int(11) DEFAULT NULL COMMENT '视频id',
  `content` text COMMENT '介绍',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zx_model_video
-- ----------------------------

-- ----------------------------
-- View structure for `zx_view_category`
-- ----------------------------
DROP VIEW IF EXISTS `zx_view_category`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `zx_view_category` AS select `a`.`id` AS `id`,`a`.`pid` AS `pid`,`a`.`catename` AS `catename`,`a`.`catedir` AS `catedir`,`a`.`sonid` AS `sonid`,`a`.`ordnum` AS `ordnum`,`a`.`ismenu` AS `ismenu`,`a`.`catepicid` AS `catepicid`,`a`.`seotitle` AS `seotitle`,`a`.`catekey` AS `catekey`,`a`.`catedesc` AS `catedesc`,`a`.`cateurl` AS `cateurl`,`a`.`modelid` AS `modelid`,`a`.`pagenum` AS `pagenum`,`a`.`cate_list` AS `cate_list`,`a`.`cate_show` AS `cate_show`,`a`.`urlrule` AS `urlrule`,`a`.`domain` AS `domain`,`a`.`allowpost` AS `allowpost`,`b`.`modelname` AS `modelname`,`b`.`tablename` AS `tablename`,`b`.`modeldesc` AS `modeldesc`,`b`.`islock` AS `islock`,`b`.`list_temp` AS `list_temp`,`b`.`show_temp` AS `show_temp`,`b`.`admin_edit_temp` AS `admin_edit_temp` from (`zx_category` `a` left join `zx_model` `b` on((`a`.`modelid` = `b`.`id`))) ;
