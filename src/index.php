<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Planner</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-quaternary">

    <?php include '../includes/header.html'; ?>

    <div class="mt-10 container mx-auto py-6 px-10 md:max-w-5xl bg-white">
        <h1 class="text-3xl font-bold text-center text-primary mb-6 mt-10">Budget Planner</h1>

    <?php
    session_start();

    if (!isset($_SESSION['expenses'])) {
        $_SESSION['expenses'] = [];
    }

    $totalBudget = 0;
    if (count($_SESSION['expenses']) > 0) {
        foreach ($_SESSION['expenses'] as $expense) {
            $totalBudget += $expense['amount'];
        }
    }

    if (count($_SESSION['expenses']) == 0) {
        echo "<p class='text-center text-gray-700'>No expenses found</p>";
    }
    ?>

        <!-- Responsive Table Wrapper -->
        <div class="overflow-x-auto">
            <table class="table-auto w-full bg-white shadow rounded-md">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2">Amount</th>
                        <th class="px-4 py-2">Date</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if (count($_SESSION['expenses']) > 0) {
                    foreach ($_SESSION['expenses'] as $index => $expense) {
                        $formattedDate = date("d F Y", strtotime($expense['date']));
                        echo "<tr class='text-gray-700'>
                            <td class='border px-4 py-2'>{$expense['description']}</td>
                            <td class='border px-4 py-2'>" . number_format($expense['amount'], 2) . "</td>
                            <td class='border px-4 py-2'>{$formattedDate}</td>
                            <td class='border px-4 py-2'>   
                                <div class='flex justify-start gap-2'> 
                                <a href='edit.php?id={$index}' class='bg-yellow-500 text-white px-3 py-1.5 rounded-md hover:bg-yellow-600'>Edit</a>
                                <a href='delete.php?id={$index}' class='bg-red-500 text-white px-3 py-1.5 rounded-md hover:bg-red-600'>Delete</a>
                                </div>
                                </td>
                        </tr>";
                    }
                }
                ?>
                </tbody>
            </table>
        </div>

        <div class="mt-6 text-center flex justify-between">
            <h3 class="text-lg font-bold text-gray-800 justify-self-cn">Total Budget: <span class="bg-green-500 text-white p-2 rounded-md text-sm md:text-base"><?php echo number_format($totalBudget, 2); ?></span></h3>
            <a href="add.php" class="text-sm md:text-base bg-blue-600 text-white p-2 rounded-md hover:bg-blue-700">Add New Expense</a>
        </div>
    </div>

</body>
</html>
