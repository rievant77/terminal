				<thead>
					<tr>
						<th>Nama</th>
						<th>Username</th>
						<th>Usergroup</th>
						<th>Password</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$queryuser = mysqli_query ($konek, "SELECT Id_User, Username, nama, Id_Usergroup_User, Id_Usergroup, Nama_Usergroup, Password FROM user INNER JOIN usergroup ON Id_Usergroup_User=Id_Usergroup");
						if($queryuser == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($user = mysqli_fetch_array ($queryuser)){
							
							echo "
								<tr>
									<td>$user[nama]</td>
									<td>$user[Username]</td>
									<td>$user[Nama_Usergroup]</td>
									<td>$user[Password]</td>
								";
								//if($user["Id_User"]==$_SESSION["Id_User"]){
								//	echo "
								//		<a href='#'>Disable</a>";
							//	}else{
								//	echo "
							//			<a href='#' onClick='confirm_delete(\"user_delete.php?Id_User=$user[Id_User]\")'>Delete</a>";
							//	}
							//echo
								"
									
								</tr>";
						}
					?>
				</tbody>