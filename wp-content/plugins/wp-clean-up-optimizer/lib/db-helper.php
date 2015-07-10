<?php 
///////////////////////////////////////////////////////////////////////////////////////////////////////
///////////                        Classes for Data Manipulation                               //////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
switch($cpo_role)
{
	case "administrator":
		$user_role_permission = "manage_options";
	break;
	case "editor":
		$user_role_permission = "publish_pages";
	break;
	case "author":
		$user_role_permission = "publish_posts";
	break;
}
if (!current_user_can($user_role_permission))
{
	return;
}
else
{
	if(!class_exists("manage_data"))
	{	
		class manage_data
		{
			function insert_data($tbl, $data)
			{
				global $wpdb;
				$wpdb->insert($tbl,$data);
			}
			
			function update_data($tbl,$data,$where)
			{
				global $wpdb;
				$wpdb->update($tbl,$data,$where);
			}
			function delete_data($tbl,$where)
			{
				global $wpdb;
				$wpdb->delete($tbl, $where);
			}
		}
	}
	if(!class_exists("delete_data"))
	{
		class delete_data
		{
			function  delete_revision($where)
			{
				global $wpdb;
				$wpdb->delete($wpdb->posts, $where);
			}
			function  delete_comments($where)
			{
				global $wpdb;
				$wpdb->delete($wpdb->comments, $where);
			}
		}
	}
}
?>