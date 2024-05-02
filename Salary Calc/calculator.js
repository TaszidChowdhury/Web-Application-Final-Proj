function calculateNetIncome() {
    const incomeType = document.getElementById('incomeType').value;
    const amount = parseFloat(document.getElementById('incomeAmount').value);
    const hoursPerWeek = parseFloat(document.getElementById('hoursPerWeek').value || 0);
    const stateTaxRate = parseFloat(document.getElementById('state').value);

    let annualIncome = amount;
    if (incomeType === 'hourly') {
        annualIncome = amount * hoursPerWeek * 52;
    }

    const taxDeduction = annualIncome * stateTaxRate;
    const netIncome = annualIncome - taxDeduction;

    const weeklyIncomeBeforeTaxes = annualIncome / 52;
    const weeklyIncomeAfterTaxes = netIncome / 52;

    document.getElementById('netIncome').textContent = netIncome.toFixed(2);
    document.getElementById('yearlyIncomeBeforeTaxes').textContent = annualIncome.toFixed(2);
    document.getElementById('weeklyIncomeBeforeTaxes').textContent = weeklyIncomeBeforeTaxes.toFixed(2);
    document.getElementById('weeklyIncomeAfterTaxes').textContent = weeklyIncomeAfterTaxes.toFixed(2);

    confetti({
        particleCount: 100,
        spread: 70,
        origin: { y: 0.6 }
    });
}

document.addEventListener('DOMContentLoaded', function () {
    function checkFade() {
        var fadeElems = document.querySelectorAll('.fade-in, .form-container');

        fadeElems.forEach(function (elem) {
            var distance = elem.getBoundingClientRect().top;
            var windowHeight = window.innerHeight;

            if (distance < windowHeight * 0.8) {
                elem.classList.add('show');
            } else {
                elem.classList.remove('show');
            }
        });
    }
    checkFade();

    window.addEventListener('scroll', checkFade);

    document.getElementById('incomeType').addEventListener('change', function() {
        const incomeType = document.getElementById('incomeType').value;
        const hoursPerWeekContainer = document.getElementById('hoursPerWeekContainer');
    
        if (incomeType === 'hourly') {
            hoursPerWeekContainer.classList.add('visible');
            hoursPerWeekContainer.classList.remove('hidden');
        } else { 
            hoursPerWeekContainer.classList.add('hidden');
            hoursPerWeekContainer.classList.remove('visible');
        }
    });
});



