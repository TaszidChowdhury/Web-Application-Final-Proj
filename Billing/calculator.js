document.getElementById('incomeType').addEventListener('change', function() {
    const incomeType = document.getElementById('incomeType').value;
    const hoursPerWeekField = document.getElementById('hoursPerWeek');
    const labelHoursPerWeek = document.querySelector('label[for="hoursPerWeek"]');

    if (incomeType === 'hourly') {
        hoursPerWeekField.style.display = 'block';
        labelHoursPerWeek.style.display = 'block';
    } else {
        hoursPerWeekField.style.display = 'none';
        labelHoursPerWeek.style.display = 'none';
    }
});

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
}
