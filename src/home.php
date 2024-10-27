<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Planner</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body class="bg-quaternary font-montserrat">

    <!-- Header -->
    <?php include '../includes/header.html'; ?>

    <!-- Hero Section -->
    <section>
        <div class="container flex flex-wrap px-5 pt-11 md:max-w-5xl mx-auto md:pt-10">
            <div class="w-full md:w-3/5 flex flex-col justify-center">
                <h2 class="text-teal-500 font-bold text-xl md:text-xl">Welcome to Budget Planner</h2>
                <h1 class="pt-1 font-extrabold text-3xl md:text-4xl text-primary">Start your Plan</h1>
                <p class="pt-1 pb-2 font-semibold text-sm md:text-lg text-primary inline-block">Plan your finances effectively and achieve your goals!</p>
                <div class="mt-2">
                    <a href="index.php" class=" bg-teal-500 font-semibold text-sm md:text-base py-3 px-7 rounded-full shadow-lg hover:bg-teal-600 focus:ring text-white">Start</a>
                </div>
            </div>
            <div class="w-full md:w-2/5 flex justify-center">
                <img src="../assets/images/hero-section-2.png" alt="" class="w-full">
            </div>
        </div>
    </section>

    <!-- Description Section -->
    <section>
        <div class="bg-gradient-to-b from-teal-500 to-blue-500 from-40% pt-20 mt-20 w-full px-5 text-primary pb-28">
            <div class="max-w-4xl mx-auto text-center text-quaternary">
                <h1 class="font-bold text-2xl md:text-3xl">What is Budget Planner?</h1>
                <div class="mt-8 max-w-xl mx-auto flex justify-center">
                    <img src="../assets/images/description.png" alt="" class="object-cover">
                </div>
                <p class="mt-8 md:mt-12 text-base font-medium md:font-semibold text-left md:text-center">
                    A budget planner is a tool designed to help you manage your finances by tracking income, expenses, and savings. It enables you to set financial goals, monitor spending habits, and create a clear roadmap toward financial stability. 
                </p>
            </div>
            <div id="tips" class="mt-10 pt-10 max-w-4xl mx-auto md:mt-28">
                <h1 class="font-bold text-2xl text-center md:text-3xl ">Tips</h1>
                <div class="grid grid-cols-1 md:grid-cols-4 mt-8 gap-6">
                    <div class="bg-white rounded-lg shadow-xl py-3 px-4 md:col-span-2 hover:bg-sky-300 hover:shadow-2xl">
                        <h2 class="text-base font-semibold">Set Clear Financial Goals</h2>
                        <p class="text-sm mt-0.5">Define short-term and long-term goals to provide motivation for your budgeting efforts.</p>
                    </div>                    
                    <div class="bg-white rounded-lg shadow-xl py-3 px-4 md:col-span-2 hover:bg-sky-300 hover:shadow-2xl">
                        <h2 class="text-base font-semibold">Track Your Income and Expenses</h2>
                        <p class="text-sm mt-0.5">Keep a record of all income sources and every expense to understand your cash flow.</p>
                    </div>                    
                    <div class="bg-white rounded-lg shadow-xl py-3 px-4 md:col-span-2 hover:bg-sky-300 hover:shadow-2xl">
                        <h2 class="text-base font-semibold">Create a Realistic Budget</h2>
                        <p class="text-sm mt-0.5">Develop a budget that reflects your actual income and expenses.</p>
                    </div>                   
                    <div class="bg-white rounded-lg shadow-xl py-3 px-4 md:col-span-2 hover:bg-sky-300 hover:shadow-2xl">
                        <h2 class="text-base font-semibold">Prioritize Savings</h2>
                        <p class="text-sm mt-0.5">Treat saving as a non-negotiable expense by allocating a specific percentage of your income to savings.</p>
                    </div>                   
                    <div class="bg-white rounded-lg shadow-xl py-3 px-4 md:col-span-2 hover:bg-sky-300 hover:shadow-2xl">
                        <h2 class="text-base font-semibold">Review and Adjust Regularly</h2>
                        <p class="text-sm mt-0.5">Periodically review your budget to ensure it aligns with your financial goals and lifestyle changes.</p>
                    </div>
                    <div class="bg-white rounded-lg shadow-xl py-3 px-4 md:col-span-2 hover:bg-sky-300 hover:shadow-2xl">
                        <h2 class="text-base font-semibold">Cut Unnecessary Expenses</h2>
                        <p class="text-sm mt-0.5">Identify and eliminate non-essential expenses to save money.</p>
                    </div>
                    <div class="bg-white rounded-lg shadow-xl py-3 px-4 md:col-span-2 hover:bg-sky-300 hover:shadow-2xl md:col-start-2">
                        <h2 class="text-base font-semibold">Utilize Budgeting Tools</h2>
                        <p class="text-sm mt-0.5">Use budgeting apps or spreadsheets to help organize your finances more effectively.</p>
                    </div>           
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include '../includes/footer.html'; ?>
</body>
</html>