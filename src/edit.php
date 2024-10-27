<?php
session_start();

$id = $_GET['id'];
$expense = $_SESSION['expenses'][$id];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $description = $_POST['description'];
    $amount = floatval($_POST['amount']);
    $date = $_POST['date'];

    $_SESSION['expenses'][$id] = [
        'description' => $description,
        'amount' => $amount,
        'date' => $date
    ];

    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Expense</title>
    <link rel="stylesheet" href="../assest/css/style.css">
</head>
<body class="bg-quaternary">

    <?php include '../includes/header.html'; ?>

    <div class="container mx-auto p-8 max-w-5xl">
        <h1 class="text-3xl font-bold text-center text-slate-700 mb-6">Edit Expense</h1>
        <form action="edit.php?id=<?php echo $id; ?>" method="POST" class="bg-white p-6 rounded-lg shadow-lg max-w-lg mx-auto border">
            <div class="mb-4">
                <label for="description" class="block text-slate-700 font-semibold">Description</label>
                <input type="text" id="description" name="description" value="<?php echo htmlspecialchars($expense['description']); ?>" required class="w-full mt-2 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="amount" class="block text-slate-700 font-semibold">Amount</label>
                <input type="number" id="amount" name="amount" value="<?php echo htmlspecialchars($expense['amount']); ?>" required class="w-full mt-2 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="date" class="block text-slate-700 font-semibold">Date</label>
                <input type="date" id="date" name="date" value="<?php echo htmlspecialchars($expense['date']); ?>" required class="w-full mt-2 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">Save Changes</button>
        </form>
    </div>

</body>
</html>
