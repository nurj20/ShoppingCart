# ShoppingCart
Basic Shopping cart logic implemented in PHP.
This tiny project does the following:
<ul>
<li>Queries database and extracts all the products avaiable to be sold through the website.</li>
<li>Dynamically generates the HTML and CSS code to dispaly them properly on the webpage. </li>
<li>Dynamically updates the shopping cart as items are added and/or removed from the shopping cart.</li> 
<li>takes into consideration when the quantity per item is more then one unit.</li>
<li>Dynamically calculates the total.</li>
</ul>
mySql database used for the project is not included. One needs to create a new database with only one table with the following fields and update the dbh.php file to match your own database settings:
<ul>
<li>name -- name of the product</li>
<li>image -- name of image of the product (three jpeg files are included with the names 1.jpeg, 2.jpeg and 3.jpeg). images are stored in the same folder as the rest of the files.</li>
<li>price -- price of the product</li>
</ul>
