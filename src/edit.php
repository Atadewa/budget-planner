<?php
include 'config.php';
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM budgets WHERE id = ?";
    $params = [$id];
    $result = sqlsrv_query($conn, $sql, $params);
    if ($result === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    $expense = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $description = $_POST['description'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];

    $sql = "UPDATE budgets SET description = ?, amount = ?, date = ? WHERE id = ?";
    $params = [$description, $amount, $date, $id];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Budget</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-quaternary">

    <?php include '../includes/header.html'; ?>

    <div class="container mx-auto p-8 max-w-5xl">
        <h1 class="text-3xl font-bold text-center text-slate-700 mb-6">Edit Budget</h1>
        <form action="edit.php?id=<?php echo $id; ?>" method="POST" class="bg-white p-6 rounded-lg shadow-lg max-w-lg mx-auto border">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($expense['id']); ?>">
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
                <input type="date" id="date" name="date" value="<?php echo htmlspecialchars($expense['date']->format('Y-m-d')); ?>" required class="w-full mt-2 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit" name="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">Save Changes</button>
        </form>
    </div>

</body>
</html>