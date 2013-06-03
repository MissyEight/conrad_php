<form id="searchform" action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
	<label for="phrase" class="visually-hidden">Search:</label>
	<input type="text" name="phrase" id="phrase" placeholder=" Search"/>
	<button type="submit" value="Search" id="searchbtn" ><img src="images/magnifier.gif"/><span class="visually-hidden">Search</span></button>
	<input type="hidden" name="page" value="search" />
</form>