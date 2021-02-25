<html>

<body>

<h1>WWT Discount Detail Search</h1>
<h2>List discounts for some, or all, P&Ls and OEMs</h2>

<form action="quotes.php" method="post">


<label for="pl">Choose a P&L:</label>
<select id="pl" name="pl" size="3">
  <option value="">All P&Ls</option>
  <option value="Commercial NE Majors">Commercial NE Majors</option>
  <option value="Commercial NJ-PA Majors">Commercial NJ-PA Majors</option>
</select> 
<br><br>

<label for="oem">Choose an OEM:</label>
<select id="oem" name="oem" size="10">
  <option value="">All OEMs</option>
  <option value="AMERICAN POWER CONVERSION">APC</option>
  <option value="APPDYNAMICS">AppDynamics</option>
  <option value="ARISTA NETWORKS, INC.">Arista</option>
  <option value="AVAYA">Avaya</option>
  <option value="CHECK POINT">Check Point</option>
  <option value="CISCO SYSTEMS (CISCOPRO)">Cisco</option>
  <option value="CITRIX">Citrix</option>
  <option value="COHESITY">Cohesity</option>
  <option value="COMMVAULT">Commvault</option>
  <option value="DELL">Dell</option>
  <option value="DOCKER">Docker</option>
  <option value="EMC2">EMC</option>
  <option value="F5 NETWORKS">F5</option>
  <option value="FORTINET">Fortinet</option>
  <option value="HEWLETT PACKARD ENTERPRISE COMPANY">HPE</option>
  <option value="HP INC.">HP Inc.</option>
  <option value="LENOVO">Lenovo</option>
  <option value="INFOBLOX">Infoblox</option>
  <option value="JUNIPER">Juniper</option>
  <option value="NETAPP">NetApp</option>
  <option value="NUTANIX">Nutanix</option>
  <option value="PALO ALTO NETWORKS">Palo Alto</option>
  <option value="PURE">Pure Storage</option>
  <option value="QUANTUM">Quantum</option>
  <option value="RIVERBED">Riverbed</option>
  <option value="RSA SECURITY INC">RSA</option>
  <option value="RUBRIK">Rubrik</option>
  <option value="SCHNEIDER ELECTRIC">Schneider Electric</option>
  <option value="SOLARWINDS">Solarwinds</option>
  <option value="VERITAS">Veritas</option>
  <option value="SYMANTEC">Symantec</option>
  <option value="VMWARE">VMware</option>
</select> 
<br><br>

<label for="sort">Choose a Sort By Column:</label>
<select id="sort" name="sort" size="7">
  <option value="" selected disabled hidden>Choose Here</option>
  <option value="quote_number">Quote Number</option>
  <option value="ext_rev">Revenue</option>
  <option value="discount">Discount</option>
  <option value="gp_perc">GP</option>
  <option value="manuf">OEM</option>
  <option value="pnl">Region</option>
  <option value="customer">Customer</option>
</select> 
<br><br>

<input type="submit" />

</form>
<a href="Innovation.html">Home</a><br>
</body>
</html>