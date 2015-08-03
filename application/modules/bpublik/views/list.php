<style>
.tree:before {
	display:inline-block;
	content:"";
	position:absolute;
	top:-20px;
	bottom:16px;
	left:0;
	border:1px dotted #67b2dd;
	z-index:1;
	border-width:0 0 0 1px;
}

.tree .tree-folder {
	width:auto;
	min-height:20px;
	cursor:pointer;
}

.tree .tree-folder .tree-folder-header {
	position:relative;
	height:20px;
	line-height:20px;
	border-radius:0;
}

.tree .tree-folder .tree-folder-header .tree-folder-name,.tree .tree-item .tree-item-name {
	display:inline;
	z-index:2;
}

.tree .tree-folder .tree-folder-header>[class*="icon-"]:first-child,.tree .tree-item>[class*="icon-"]:first-child {
	display:inline-block;
	position:relative;
	z-index:2;
	top:-1px;
}

.tree .tree-folder .tree-folder-header .tree-folder-name {
	margin-left:2px;
}

.tree .tree-folder .tree-folder-header>[class*="icon-"]:first-child {
	margin:-2px 0 0 -2px;
}

.tree .tree-folder:last-child:after {
	display:inline-block;
	content:"";
	position:absolute;
	z-index:1;
	top:15px;
	bottom:0;
	left:-15px;
	border-left:1px solid #FFF;
}

.tree .tree-folder .tree-folder-content {
	margin-left:23px;
	position:relative;
}

.tree .tree-folder .tree-folder-content:before {
	display:inline-block;
	content:"";
	position:absolute;
	z-index:1;
	top:-14px;
	bottom:16px;
	left:-14px;
	border:1px dotted #67b2dd;
	border-width:0 0 0 1px;
}

.tree .tree-item {
	position:relative;
	height:20px;
	line-height:20px;
	cursor:pointer;
}

.tree .tree-item .tree-item-name {
	margin-left:3px;
}

.tree .tree-item .tree-item-name>[class*="icon-"]:first-child {
	margin-right:3px;
}

.tree .tree-item>[class*="icon-"]:first-child {
	margin-top:-1px;
	color:#f9e8ce;
	width:13px;
	height:13px;
	line-height:13px;
	font-size:11px;
	text-align:center;
	border-radius:3px;
	background-color:#fafafa;
	border:1px solid #CCC;
	box-shadow:0 1px 2px rgba(0,0,0,0.05);
}

.tree .tree-folder,.tree .tree-item {
	position:relative;
}

.tree .tree-folder:before,.tree .tree-item:before {
	display:inline-block;
	content:"";
	position:absolute;
	top:14px;
	left:-13px;
	width:18px;
	height:0;
	border-top:1px dotted #67b2dd;
	z-index:1;
}

.tree .tree-selected {
	background-color:rgba(98,168,209,0.1);
	color:#6398b0;
}

.tree .tree-selected:hover {
	background-color:rgba(98,168,209,0.1);
}

.tree .tree-item,.tree .tree-folder {
	border:1px solid #FFF;
}

.tree .tree-item,.tree .tree-folder .tree-folder-header {
	color:#4d6878;
	margin:0;
	padding:5px;
}

.tree .tree-selected>[class*="icon-"]:first-child {
	background-color:#f9a021;
	color:#FFF;
	border-color:#f9a021;
}

.tree .icon-plus[class*="icon-"]:first-child,.tree .icon-minus[class*="icon-"]:first-child {
	vertical-align:middle;
	height:11px;
	width:11px;
	text-align:center;
	border:1px solid #8baebf;
	line-height:10px;
	background-color:#FFF;
	position:relative;
	z-index:1;
}

.tree .icon-plus[class*="icon-"]:first-child:before {
	display:block;
	content:"+";
	font-family:"Open Sans";
	font-size:16px;
	position:relative;
	z-index:1;
}

.tree .icon-minus[class*="icon-"]:first-child:before {
	content:"";
	display:block;
	width:7px;
	height:0;
	border-top:1px solid #4d6878;
	position:absolute;
	top:5px;
	left:2px;
}

.tree .tree-unselectable .tree-item>[class*="icon-"]:first-child {
	color:#5084a0;
	width:13px;
	height:13px;
	line-height:13px;
	font-size:10px;
	text-align:center;
	border-radius:0;
	background-color:transparent;
	border:0;
	box-shadow:none;
}

.tree [class*="icon-"][class*="-down"] {
	transform:rotate(-45deg);
}

.tree .icon-spin {
	height:auto;
}

.tree .tree-loading {
	margin-left:36px;
}

.tree img {
	display:inline;
	veritcal-align:middle;
}

.tree .tree-folder .tree-folder-header:hover,.tree .tree-item:hover {
	background-color:#f0f7fc;
}
</style>
<?php
	$sql = $this->db->query("select * from tb_menu_member where parrent = '0' order by id");
?>
<div class="tree tree-selectable" style="oveflow-y:hidden">
<span onClick="PilihData('0','ROOT');" style="cursor:pointer;">ROOT</span>
<?php 
	foreach($sql->result() as $row){
		$sql2 = $this->db->query("select * from tb_menu_member where parrent='".$row->id."'");
		if($sql2->num_rows() > 0){
?>
	<div class="tree-folder" style="display: block;">
		<div class="tree-folder-header">
			<i id="fd<?php echo $row->id?>" class="icon-plus" onClick="TreeMenu('<?php echo $row->id?>');"></i>
			<div class="tree-folder-name" onClick="PilihData('<?php echo $row->id?>','<?php echo $row->nama_menu?>');"><?php echo $row->nama_menu?></div>
		</div>
		<div id="tr<?php echo $row->id?>" class="tree-folder-content" style="display: none;">
				
		</div>
		<div class="tree-loader" style="display: none;">
			<div class="tree-loading">
				<i class="icon-refresh icon-spin blue"></i>
			</div>
		</div>
	</div>
<?php }else{ ?>
	<div class="tree-item" style="display: block;">
		<i class="icon-remove"></i>
		<div class="tree-item-name"  onClick="PilihData('<?php echo $row->id?>','<?php echo $row->nama_menu?>');"><?php echo $row->nama_menu?></div>
	</div>
		
<?php
		}
	}
?>
</div>
	
<script>
function TreeMenu(v)
{
	var namaClass= document.getElementById('fd'+v).className;
	if(namaClass=='icon-plus'){
		$("#fd"+v).removeClass('icon-plus').addClass('icon-minus');
		var url2 = '<?php echo site_url('bpublik/ambil_child')?>'+'/'+v;
		$("#tr"+v).html("").load(url2);
		$("#tr"+v).css('display','block');
	}else{
		$("#fd"+v).removeClass('icon-minus').addClass('icon-plus');
		$("#tr"+v).empty();
		$("#tr"+v).css('display','none');
	}
}

function PilihData(a,b)
{
	$('#parrent').val(a);
	$('#nama_parrent').val(b);
	modal_keluar();
}

function modal_keluar()
{
	document.getElementById('modal_jabatan').style.display='none';
	document.getElementById('lyar-mask').style.display='none';
	$('.table-header').empty(); 
	$('#detail-table').empty();
}
</script>