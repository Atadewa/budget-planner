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
    <?php include 'config.php'; ?>

    <div class="mt-10 container mx-auto py-6 px-10 md:max-w-5xl bg-white">
        <h1 class="text-3xl font-bold text-center text-primary mb-6 mt-10">Budget Planner</h1>

        <?php
        $totalBudget = 0;
        $expenses = [];

        // Ambil data dari SQL Server
        $sql = "SELECT * FROM budgets ORDER BY date DESC";
        $stmt = sqlsrv_query($conn, $sql);

        if ($stmt === false) {
            echo "<p class='text-center text-gray-700'>Failed to fetch data: " . print_r(sqlsrv_errors(), true) . "</p>";
        } else {
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $expenses[] = $row;
                $totalBudget += $row['amount'];
            }
        }

        if (count($expenses) == 0) {
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
                if (count($expenses) > 0) {
                    foreach ($expenses as $expense) {
                        $formattedDate = $expense['date']->format('d F Y');
                        echo "<tr class='text-gray-700'>
                            <td class='border px-4 py-2'>" . htmlspecialchars($expense['description']) . "</td>
                            <td class='border px-4 py-2'>" . number_format($expense['amount'], 2) . "</td>
                            <td class='border px-4 py-2'>" . htmlspecialchars($formattedDate) . "</td>
                            <td class='border px-4 py-2'>   
                                <div class='flex justify-start gap-2'> 
                                <a href='edit.php?id=" . htmlspecialchars($expense['id']) . "' class='bg-yellow-500 text-white px-3 py-1.5 rounded-md hover:bg-yellow-600'>Edit</a>
                                <a href='delete.php?id=" . htmlspecialchars($expense['id']) . "' class='bg-red-500 text-white px-3 py-1.5 rounded-md hover:bg-red-600' onclick='return confirm(\"Are you sure you want to delete this expense?\");'>Delete</a>
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
            <a href="add.php" class="text-sm md:text-base bg-blue-600 text-white p-2 rounded-md hover:bg-blue-700">Add New Budget</a>
        </div>
    </div>

</body>
</html>