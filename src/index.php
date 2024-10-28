<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Planner</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let deleteUrl = '';
    
            $('.delete-button').on('click', function(e) {
                e.preventDefault();
                deleteUrl = $(this).attr('href');
                $('#confirm').removeClass('hidden');
            });
    
            $('#confirmDelete').on('click', function() {
                window.location.href = deleteUrl;
            });
    
            $('#cancelDelete').on('click', function() {
                $('#confirm').addClass('hidden');
            });
        });
    </script>

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
                                <a href='delete.php?id=" . htmlspecialchars($expense['id']) . "' class='bg-red-500 text-white px-3 py-1.5 rounded-md hover:bg-red-600 delete-button'>Delete</a>
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

    <div id="confirm" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-11/12 md:w-1/3">
        <h2 class="text-xl font-bold text-center mb-4">Confirm Deletion</h2>
        <p class="text-center mb-4">Are you sure you want to delete this expense?</p>
        <div class="flex justify-center space-x-4">
            <button id="cancelDelete" class="bg-sky-500 text-white px-4 py-2 rounded-lg hover:bg-sky-600">Cancel</button>
            <button id="confirmDelete" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Delete</button>
        </div>
    </div>
</div>

</body>
</html>