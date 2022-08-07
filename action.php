<?php

//action.php

$conection_db = new PDO("mysql:host=localhost; dbname=login_system", "root", "");


if(isset($_POST["action"]))
{
	if($_POST["action"] == 'fetch')
	{
		$order_column = array('nama', 'jumlah', 'tanggal');

		$main_query = "SELECT nama, SUM(jumlah) AS jumlah, tanggal 
		FROM transaksi
		";

		$search_query = 'WHERE tanggal <= "'.date('Y-m-d').'" AND ';
		if(isset($_POST["start_date"], $_POST["end_date"]) && $_POST["start_date"] != '' && $_POST["end_date"] != '')
		{
			$search_query .= 'tanggal >= "'.$_POST["start_date"].'" AND tanggal <= "'.$_POST["end_date"].'" AND ';
		}
		if(isset($_POST["search"]["value"]))
		{
			$search_query .= '(nama LIKE "%'.$_POST["search"]["value"].'%" OR jumlah LIKE "%'.$_POST["search"]["value"].'%" OR tanggal LIKE "%'.$_POST["search"]["value"].'%")';
		}
		$group_by_query = " GROUP BY tanggal ";
		$order_by_query = "";
		if(isset($_POST["order"]))
		{
			$order_by_query = 'ORDER BY '.$order_column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$order_by_query = 'ORDER BY tanggal DESC ';
		}

		$limit_query = '';

		if($_POST["length"] != -1)
		{
			$limit_query = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		$statement = $conection_db->prepare($main_query . $search_query . $group_by_query . $order_by_query);
		$statement->execute();
		$filtered_rows = $statement->rowCount();
		$statement = $conection_db->prepare($main_query . $group_by_query);
		$statement->execute();
		$total_rows = $statement->rowCount();
		$result = $conection_db->query($main_query . $search_query . $group_by_query . $order_by_query . $limit_query, PDO::FETCH_ASSOC);
		$data = array();

		foreach($result as $row)
		{
			$sub_array   = array();
			$sub_array[] = $row['nama'];
			$sub_array[] = $row['jumlah'];
			$sub_array[] = $row['tanggal'];

			$data[] = $sub_array;
		}

		$output = array(
			"draw"			=>	intval($_POST["draw"]),
			"recordsTotal"	=>	$total_rows,
			"recordsFiltered" => $filtered_rows,
			"data"			=>	$data
		);

		echo json_encode($output);
	}
}

?>