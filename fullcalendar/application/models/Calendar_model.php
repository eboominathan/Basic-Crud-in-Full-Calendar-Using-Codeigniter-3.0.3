<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar_model extends CI_Model {


/*Read the data from DB */
	Public function getEvents()
	{
		
	$sql = "SELECT * FROM events WHERE events.date BETWEEN ? AND ? ORDER BY events.date ASC";
	return $this->db->query($sql, array($_GET['start'], $_GET['end']))->result();

	}

/*Create new events */

	Public function addEvent()
	{

	$sql = "INSERT INTO events (title,events.date, description, color) VALUES (?,?,?,?)";
	$this->db->query($sql, array($_POST['title'], $_POST['date'], $_POST['description'], $_POST['color']));
		return ($this->db->affected_rows()!=1)?false:true;
	}

	/*Update  event */

	Public function updateEvent()
	{

	$sql = "UPDATE events SET title = ?, events.date = ?, description = ?, color = ? WHERE id = ?";
	$this->db->query($sql, array($_POST['title'], $_POST['date'], $_POST['description'], $_POST['color'], $_POST['id']));
		return ($this->db->affected_rows()!=1)?false:true;
	}


	/*Delete event */

	Public function deleteEvent()
	{

	$sql = "DELETE FROM events WHERE id = ?";
	$this->db->query($sql, array($_GET['id']));
		return ($this->db->affected_rows()!=1)?false:true;
	}

	/*Update  event */

	Public function dragUpdateEvent()
	{
			$date=date('Y-m-d h:i:s',strtotime($_POST['date']));

			$sql = "UPDATE events SET  events.date = ? WHERE id = ?";
			$this->db->query($sql, array($date, $_POST['id']));
		return ($this->db->affected_rows()!=1)?false:true;


	}






}