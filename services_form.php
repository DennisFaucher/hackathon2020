<html>

<body>

<h1>WWT SOW Detail Search</h1>
<h2>List Hourly Rate for some, or all, P&Ls and Practices</h2>

<form action="services_table.php" method="post">


<label for="pl">Choose a P&L:</label>
<select id="pl" name="pl" size="3">
  <option value="">All P&Ls</option>
  <option value="Comm NE Majors Reps">Comm NE Majors Reps</option>
  <option value="Comm NJ-PA Majors Reps">Comm NJ-PA Majors Reps</option>
</select> 
<br><br>

<label for="practice">Choose a Practice:</label>
<select id="practice" name="practice" size="10">
  <option value="">All Practices</option>
  <option value="Automation">Automation</option>
  <option value="Big Data">Big Data</option>
  <option value="Cloud">Cloud</option>
  <option value="Collaboration">Collaboration</option>
  <option value="Compute">Compute</option>
  <option value="Data Center Strategy">Data Center Strategy</option>
  <option value="Digital">Digital</option>
  <option value="End User Computing">End User Computing</option>
  <option value="Mobility">Mobility</option>
  <option value="Network Solutions">Network Solutions</option>
</select> 
<br><br>

<label for="sort">Choose a Sort By Column:</label>
<select id="sort" name="sort" size="6">
  <option value="" selected disabled hidden>Choose Here</option>
  <option value="Revenue">Revenue</option>
  <option value="Margin">Margin</option>
  <option value="Rate">Rate</option>
  <option value="Practice">Practice</option>
  <option value="Account">Account</option>
  <option value="Organization">P&L</option>
</select> 
<br><br>

<input type="submit" />

</form>
<a href="Innovation.html">Home</a><br>
</body>
</html>