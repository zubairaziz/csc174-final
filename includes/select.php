<?php
require_once "../config/config.php";

$connect = null;
$user->connection = null;

$connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

$output = '';
$sql = "SELECT * FROM survey ORDER BY surveyID DESC";
$result = mysqli_query($connect, $sql);
$output .= '
      <div class="table-responsive">
           <table class="table table-bordered">
                <tr>
                     <th style="background-color: #5f4938; color: #fff;">Name</th>
                     <th style="background-color: #5f4938; color: #fff;">Email</th>
                     <th style="background-color: #5f4938; color: #fff;">Helpful(yes/no)</th>
                     <th style="background-color: #5f4938; color: #fff;">Genre</th>
                     <th style="background-color: #5f4938; color: #fff;">Add/Update/Delete</th>
                </tr>';
$rows = mysqli_num_rows($result);
if ($rows > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $output .= '
                <tr>
                     <td class="name" data-id1="' . $row["surveyID"] . '" contenteditable>' . $row["name"] . '</td>
                     <td class="email" data-id2="' . $row["surveyID"] . '" contenteditable>' . $row["email"] . '</td>
                     <td class="helpful" data-id3="' . $row["surveyID"] . '" contenteditable>' . $row["helpful"] . '</td>
                     <td class="genre" data-id4="' . $row["surveyID"] . '" contenteditable>' . $row["genre"] . '</td>
                     <td>
                        <button type="button" name="delete_btn" data-id5="' . $row["surveyID"] . '" class="btn btn-xs btn-danger btn_delete">x</button>
                     </td>
                </tr>
           ';
    }
    $output .= '
           <tr>
                <td id="name" contenteditable></td>
                <td id="email" contenteditable></td>
                <td id="helpful" contenteditable></td>
                <td id="genre" contenteditable></td>
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>
           </tr>
      ';
} else {
    $output .= '
				<tr>
                    <td id="name" contenteditable></td>
                    <td id="email" contenteditable></td>
                    <td id="helpful" contenteditable></td>
                    <td id="genre" contenteditable></td>
					<td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>
			   </tr>';
}
$output .= '</table>
      </div>';
echo $output;
