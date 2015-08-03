<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

	function make_menu(){
		$CI =& get_instance();
		$menunav = '';
		$s_access = $CI->session->userdata('sesi_nama_pengguna');
		$sql = " select a.* 
				from tb_menu a
				left join tb_menu_user b
				on (a.id = b.id_menu)
				where a.parrent = 0
				and b.username = '".$s_access."'
				and a.status = 1";
		$query = $CI->db->query($sql);
		$i=0;
		foreach($query->result_array() as $row)
		{
			if(toogle($row['id'],$s_access) > 0){
				$menunav .= "<li>";
				$menunav .= '<a href="'.site_url($row['link']).'" data-toggle="dropdown" class="dropdown-toggle"><span>'.$row['nama_menu'].'</span><span class="caret"></span></a>';
			}else{
				$menunav .= "<li>";
				$menunav .= '<a href="'.site_url($row['link']).'"><span>'.$row['nama_menu'].'</span></a>';
			}
			$menunav .=	formatTree($row['id'],$s_access);
			$menunav .= "</li>";
			$i++;
		}
		
		echo $menunav;
	}		
	
	function formatTree($id_parrent, $s_access){
		$CI =& get_instance();
		$sql = " select a.* 
				from tb_menu a
				left join tb_menu_user b
				on (a.id = b.id_menu)
				where a.parrent = '".$id_parrent."'
				and b.username = '".$s_access."'
				and a.status = 1";
		$query = $CI->db->query($sql);
		$menunav = "<ul class='dropdown-menu'>";
        foreach($query->result_array() as $item){
			
			if(toogle($item['id'],$s_access) > 0){
				$menunav .= "<li class='dropdown-submenu'>";
				$menunav .= '<a href="'.site_url($item['link']).'" data-toggle="dropdown" class="dropdown-toggle">'.$item['nama_menu'].'</a>';
			}else{
				$menunav .= "<li>";
				$menunav .= '<a href="'.site_url($item['link']).'">'.$item['nama_menu'].'</a>';
			}
			$menunav.= formatTree($item['id'],$s_access);
			$menunav.= "</li>";
			
        }

      $menunav.= "</ul>";
	  return $menunav;
    }
	
	function toogle($id_parrent, $s_access){
		$CI =& get_instance();
		$sql = " select a.* 
				from tb_menu a
				left join tb_menu_user b
				on (a.id = b.id_menu)
				where a.parrent = '".$id_parrent."' 
				and b.username = '".$s_access."'
				and a.status = 1";
		$query = $CI->db->query($sql);
		return $query->num_rows();
    }
	
	function make_cek(){
		$CI =& get_instance();
		$menunav = '';
		$s_akmenu = $CI->session->userdata('s_akses_menu');
		$sql = " select * from tb_menu where parrent = 0 and status = 1";
		$query = $CI->db->query($sql);
		$i=0;
		foreach($query->result_array() as $row)
		{
			$menunav .= "<li>";
			$menunav .= '<label> &nbsp; <input type="checkbox" value="'.$row['id'].'" name="dicek[]" class="selected" '.(isset($s_akmenu[$row['id']])?'checked':'').'> '.$row['nama_menu'].'</label>';
			$menunav .=	formatCek($row['id'],$s_akmenu);
			$menunav .= "</li>";
			$i++;
		}
		echo $menunav;
	}		
	
	function formatCek($id_parrent, $s_akmenu){
		$CI =& get_instance();
		$sql = " select * from tb_menu where parrent = '".$id_parrent."' and status = 1";
		$query = $CI->db->query($sql);
		$menunav = "<ol>";
        foreach($query->result_array() as $item){
			$menunav.= "<li>";
			$menunav .= '<label> &nbsp; <input type="checkbox" value="'.$item['id'].'" name="dicek[]" class="selected" '.(isset($s_akmenu[$item['id']])?'checked':'').'> '.$item['nama_menu'].'</label>';
			$menunav.= formatCek($item['id'],$s_akmenu);
			$menunav.= "</li>";
			
        }
      $menunav.= "</ol>";
	  return $menunav;
    }
	
	function tampil_menu($tahun){
		$CI =& get_instance();
		$menunav = '';
		$sql = " select * from tb_menu_member where parrent = 0 and tahun=$tahun";
		$query = $CI->db->query($sql);
		$i=0;
		foreach($query->result() as $row)
		{
			if(toogles($row->id) > 0){
				$menunav .= '<div class="tree-folder" style="display: block;">
					<div class="tree-folder-header">
						<i class="icon-minus"></i>
						<div class="tree-folder-name">'.$row->nama_menu.'</div>
					<a class="btn btn-important btn-mini" href="'.site_url('bpublik/open_form_edit/'.$row->id.'/'.$tahun).'"><i class="icon-pencil"></i> EDIT DATA</a> 

					</div>
					<div class="tree-folder-content">';
				$menunav .=	formatTampil($row->id,$tahun);
				$menunav .= '</div>
					<div class="tree-loader" style="display: none;">
						<div class="tree-loading">
							<i class="icon-refresh icon-spin blue"></i>
						</div>
					</div>
				</div>';
			}else{
				$menunav .= '<div class="tree-item" style="display: block;">
					<i class="icon-remove"></i>
					<div class="tree-item-name">'.$row->nama_menu.' &nbsp; &nbsp; &nbsp; 
					<a class="btn btn-important btn-mini" href="'.site_url('bpublik/open_form_edit/'.$row->id.'/'.$tahun).'"><i class="icon-pencil"></i> EDIT DATA</a> 
					<a class="btn btn-success btn-mini" href="'.site_url('bpublik/open_form/'.$row->id.'/'.$tahun).'"><i class="icon-pencil"></i></a>
					<a class="btn btn-danger btn-mini" href="'.site_url('bpublik/delete/'.$row->id.'/'.$tahun).'"><i class="icon-trash"></i></a></div>
				</div>';
			}
			$i++;
		}
		echo $menunav;
	}		
	
	function formatTampil($id_parrent,$tahun){
		$CI =& get_instance();
		$sql = " select * from tb_menu_member where parrent = '".$id_parrent."' and tahun='".$tahun."'";
		$query = $CI->db->query($sql);
		$menunav = "";
        foreach($query->result() as $item){
			if(toogles($item->id) > 0){
				$menunav .= '<div class="tree-folder" style="display: block;">
					<div class="tree-folder-header">
						<i class="icon-minus"></i>
						<div class="tree-folder-name">'.$item->nama_menu.'</div>
						<a class="btn btn-important btn-mini" href="'.site_url('bpublik/open_form_edit/'.$item->id.'/'.$tahun).'"><i class="icon-pencil"></i> EDIT DATA</a> 

					</div>
					<div class="tree-folder-content">';
				$menunav .=	formatTampil($item->id,$tahun);
				$menunav .= '</div>
					<div class="tree-loader" style="display: none;">
						<div class="tree-loading">
							<i class="icon-refresh icon-spin blue"></i>
						</div>
					</div>
				</div>';
			}else{
				$menunav .= '<div class="tree-item" style="display: block;">
					<i class="icon-remove"></i>
					<div class="tree-item-name">'.$item->nama_menu.' &nbsp; &nbsp; &nbsp; 
					<a class="btn btn-important btn-mini" href="'.site_url('bpublik/open_form_edit/'.$item->id.'/'.$tahun).'"><i class="icon-pencil"></i> EDIT DATA</a> 
					<a class="btn btn-primary btn-mini" href="'.site_url('bpublik/open_form_setting/'.$item->id.'/'.$tahun).'"><i class="icon-cogs"></i> SET FORM & FILTER</a> 
					<a class="btn btn-warning btn-mini" href="'.site_url('bpublik/open_form_view/'.$item->id.'/'.$tahun).'"><i class="icon-search"></i> LIHAT DATA</a> 
					<a class="btn btn-success btn-mini" href="'.site_url('bpublik/open_form_add/'.$item->id.'/'.$tahun).'"><i class="icon-pencil"></i> INPUT DATA</a> 
					<a class="btn btn-danger btn-mini" href="'.site_url('bpublik/delete/'.$item->id.'/'.$tahun).'" onclick="return confirm("Anda Yakin ingin Menghapus, Data Yang Berkaitan Dengan Tahun Ini Akan Terhapus Otomatis?");"><i class="icon-trash"></i> HAPUS</a>
					
					</div>
				</div>';
			}
        }
		return $menunav;
    }
	
	function toogles($id_parrent){
		$CI =& get_instance();
		$sql = " select * from tb_menu_member where parrent = '".$id_parrent."'";
		$query = $CI->db->query($sql);
		return $query->num_rows();
    }
	
	function make_member($tahun){
		$CI =& get_instance();
		$menunav = '';
		$sql = " select * from tb_menu_member where parrent = 0 and tahun='".$tahun."'";
		$query = $CI->db->query($sql);
		$i=0;
		foreach($query->result_array() as $row)
		{
			if(toogle_member($row['id']) > 0){
				$menunav .= '<li>';
				//$menunav .= '<a href="'.site_url(($row['link']=='')?'submenu/display/'.$row['id']:$row['link']).'" class="dropdown-toggle" data-toggle="dropdown">'.$row['nama_menu'].'<b class="caret"></b></a>';
				$menunav .= '<a href="'.site_url(($row['link']=='')?'dokumentasi/data/'.$row['id']:$row['link']).'" class="dropdown-toggle" data-toggle="dropdown">'.$row['nama_menu'].'<b class="caret"></b></a>';
				$menunav .= "<ul class='dropdown-menu multi-level' >";
				$menunav .=	formatMember($row['id'],$tahun);
				$menunav .= '</ul>';
				$menunav .= "</li>";
			}else{
				$menunav .= "<li>";
				//$menunav .= '<a href="'.site_url(($row['link']=='')?'submenu/display/'.$row['id']:$row['link']).'">'.$row['nama_menu'].'</a>';
				$menunav .= '<a href="'.site_url(($row['link']=='')?'dokumentasi/data/'.$row['id']:$row['link']).'">'.$row['nama_menu'].'</a>';
				$menunav .= "</li>";
			}
			//$menunav .=	formatMember($row['id']);
			//$menunav .= "</li>";
			$i++;
		}
		
		echo $menunav;
	}		
	
	function formatMember($id_parrent,$tahun){
		$CI =& get_instance();
		$sql = " select * from tb_menu_member where parrent = '".$id_parrent."' and  tahun='".$tahun."'";
		$query = $CI->db->query($sql);
		//$menunav = "<ul class='dropdown-menu'>";
		$menunav = "";
        foreach($query->result_array() as $item){
			
			if(toogle_member($item['id']) > 0){
				$menunav .= '<li class="dropdown-submenu" >';
				//$menunav .= '<a href="'.site_url(($item['link']=='')?'submenu/display/'.$item['id']:$item['link']).'" class="dropdown-toggle" data-toggle="dropdown">'.$item['nama_menu'].'</a>';
				$menunav .= '<a href="'.site_url(($item['link']=='')?'dokumentasi/data/'.$item['id']:$item['link']).'" class="dropdown-toggle" data-toggle="dropdown">'.$item['nama_menu'].'</a>';
				$menunav .= "<ul class='dropdown-menu'>";
				$menunav.= formatMember($item['id'],$tahun);
				$menunav.= "</ul>";
				$menunav.= "</li>";
			}else{
				$menunav .= "<li>";
				//$menunav .= '<a href="'.site_url(($item['link']=='')?'submenu/display/'.$item['id']:$item['link']).'">'.$item['nama_menu'].'</a>';
				$menunav .= '<a href="'.site_url(($item['link']=='')?'dokumentasi/data/'.$item['id']:$item['link']).'">'.$item['nama_menu'].'</a>';
				$menunav.= "</li>";
			}
			//$menunav.= formatMember($item['id']);
			//$menunav.= "</li>";
        }
      //$menunav.= "</ul>";
	  return $menunav;
    }
	
	function toogle_member($id_parrent){
		$CI =& get_instance();
		$sql = " select * from tb_menu_member where parrent = '".$id_parrent."'";
		$query = $CI->db->query($sql);
		return $query->num_rows();
    }

	
	function printbreadcrumb($category_id) {
	
	$sql = "SELECT id, parrent, nama_menu
				FROM tb_menu_member
				WHERE id=$category_id";
	$result	= mysql_query($sql) or die('something is wrong here');
	$row = mysql_fetch_array($result);
	if ($row['parrent']) { // if this node has parent
		printbreadcrumb($row['parrent']); // make recursive call to this function
	}
	echo $row['nama_menu'].' > '; // print nodes one by one
	return;
}

	
	
	
	
	
	
	
?>