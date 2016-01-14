<?php
include('connection.php');

$tableName="nieuws";
$targetpage = "Nieuws.php";
$limit = 10;
//Dit stukje hieronder weigert dienst (rij 9 om precies te zijn)
$query = "SELECT COUNT(*) as num FROM $tableName";
$total_pages = fetch(PDO::FETCH_BOTH ($query));
$total_pages = $total_pages[10];

$stages = 3;
$page = ($_GET['page']);
if($page){
$start = ($page - 1) * $limit;
}else{
$start = 0;
}

// Paginainformatie
$query1 = "SELECT * FROM $tableName LIMIT $start, $limit";
$result = ($query1);

// pagina nummering setup
if ($page == 0){$page = 1;}
$prev = $page - 1;
$next = $page + 1;
$lastpage = ceil($total_pages/$limit);
$LastPagem1 = $lastpage - 1;

$paginate = '';
if($lastpage > 1)
{

$paginate .= "<div class='paginate'>";
// vorige knop
if ($page > 1){
$paginate.= "<a href='$targetpage?page=$prev'>previous</a>";
}else{
$paginate.= "<span class='disabled'>previous</span>"; }

// pagina's
if ($lastpage < 7 + ($stages * 2)) // Niet genoeg pagina's om op te breken
{
for ($counter = 1; $counter <= $lastpage; $counter++)
{
if ($counter == $page){
$paginate.= "<span class='current'>$counter</span>";
}else{
$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}
}
}
elseif($lastpage > 5 + ($stages * 2)) // Genoeg om everntueel te verbergen
{
// Begin verbergt alleen latere pagina's
if($page < 1 + ($stages * 2))
{
for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
{
if ($counter == $page){
$paginate.= "<span class='current'>$counter</span>";
}else{
$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}
}
$paginate.= "...";
$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";
}
// Midden verbergt ervoor en erna
elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
{
$paginate.= "<a href='$targetpage?page=1'>1</a>";
$paginate.= "<a href='$targetpage?page=2'>2</a>";
$paginate.= "...";
for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
{
if ($counter == $page){
$paginate.= "<span class='current'>$counter</span>";
}else{
$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}
}
$paginate.= "...";
$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";
}
// verbergt alleen latere
else
{
$paginate.= "<a href='$targetpage?page=1'>1</a>";
$paginate.= "<a href='$targetpage?page=2'>2</a>";
$paginate.= "...";
for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
{
if ($counter == $page){
$paginate.= "<span class='current'>$counter</span>";
}else{
$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}
}
}
}

// volgende knop
if ($page < $counter - 1){
$paginate.= "<a href='$targetpage?page=$next'>next</a>";
}else{
$paginate.= "<span class='disabled'>next</span>";
}

$paginate.= "</div>";

}
echo $total_pages.' Results';