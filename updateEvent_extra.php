<?php
echo "<H3>Add or Update Trips</H3>";
              
              echo "<script type ='text/javascript'' src='checkRequired.js'></script>";
              
              echo "<form id='autologin' action='addevent.php' onsubmit = 'return checkRequired()' method='post'>";
              echo "<input type='hidden' name='Email' value=$email />";
              echo "<input type='hidden' name='Pass' value=$pass />";
              
              echo "<br>Please enter the event you want to edit or add: <br>";
              echo "<table width = 300>";
              echo "<tr><td>Event Name:</td> <td> <input type='text' name='eName' /> </td></tr>";
              echo "</table>";
              
              echo "<br>Please enter your new trip information: <br>";
              echo "<table width = 300>";
              echo "<tr><td>Origin:</td> <td> <input type='text' name='Origin' /> </td></tr>";
              echo "<tr><td>Destination: </td> <td> <input type='text' name='Destination' /> </td> </tr>";
              echo "<tr><td>Departure Date:</td> <td> <input type='date' name='dDate' /> </td></tr>";
              echo "<tr><td>Departure Time: </td> <td> <input type='time' name='dTime' /> </td> </tr>";
              echo "</table>";

              echo "<br>Do you have a car for this event: <br>";
              echo "<table width = 100>";
              echo "<tr><td> <input type='radio' name='Hascar' value= 0 />  </td> <td>Yes </td></tr>";
              echo "<tr><td> <input type='radio' name='Hascar' value= 1 /> </td> <td> No </td></tr>";
              echo "</table>";
              echo "<br>If you have a car, how many seats can you offer: <br>";
              echo "<table width = 100>";
              echo "<tr><td> <input type='number' name='Seats' />  </td> </tr>";
              echo "</table>";

              echo "<br><input type='submit' value='Update'><br>";
              echo "</form>";
              echo "<br><br>";
?>