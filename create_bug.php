<?php
// create_bug.php
require_once "bootstrap.php";

$theReporterId = $argv[1];
$theDefaultEngineerId = $argv[1];
$productIds = explode(",", $argv[3]);

// getting reporter by id
$reporter = $entityManager->find("User", $theReporterId);
// getting enginer by id
$engineer = $entityManager->find("User", $theDefaultEngineerId);
// if any one of them are not found then exit
if (!$reporter || !$engineer) {
    echo "No reporter and/or engineer found for the input.\n";
    exit(1);
}

// now creating new bug
$bug = new Bug();
$bug->setDescription("Something does not work!");
$bug->setCreated(new DateTime("now"));
$bug->setStatus("OPEN");

// adding product to bug
foreach ($productIds AS $productId) {
	// getting product id
    $product = $entityManager->find("Product", $productId);
	// assigning product to bug
    $bug->assignToProduct($product);
}

$bug->setReporter($reporter);
$bug->setEngineer($engineer);

$entityManager->persist($bug);
$entityManager->flush();

echo "Your new Bug Id: ".$bug->getId()."\n";