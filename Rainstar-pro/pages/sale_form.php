<?php
// blank-page.php
// Keeps header, sidebar, navbar and footer. Content area is intentionally empty.
include "../includes/header.php";
include "../includes/sidebar.php";
?>
<div class="container-fluid page-body-wrapper">
  <?php include "../includes/navbar.php"; ?>

  <div class="main-panel">
    <div class="content-wrapper">

    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sales Form</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #0f0f0f, #1a1a1a);
      color: #e0e0e0;
      /* padding: 40px; */
    }

    .form-container {
      background: #191d24;
      backdrop-filter: blur(12px);
      border-radius: 14px;
      padding: 30px 40px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.6);
      max-width: 900px;
      margin: auto;
      border: 1px solid rgba(255, 255, 255, 0.05);
    }

    h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #ffffff;
      letter-spacing: 0.5px;
    }

    .form-group {
      display: flex;
      flex-direction: column;
      margin-bottom: 20px;
    }

    label {
      margin-bottom: 8px;
      font-weight: 600;
      color: #bdbdbd;
    }

    input, select {
      padding: 10px 14px;
      border-radius: 8px;
      border: 1px solid #333;
      font-size: 15px;
      background-color: rgba(40, 40, 40, 0.9);
      color: #ffffff;
      transition: all 0.3s ease;
    }

    input:focus, select:focus {
      border-color: #4dabf7;
      outline: none;
      box-shadow: 0 0 8px rgba(77, 171, 247, 0.5);
      background-color: rgba(50, 50, 50, 0.95);
    }

    .grid-row {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)) 50px;
      gap: 20px;
      margin-bottom: 15px;
      align-items: end;
    }

    .add-medicine-btn {
      margin-top: 10px;
      padding: 10px 18px;
      border: none;
      background: linear-gradient(135deg, #27ae60, #1e8449);
      color: white;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .add-medicine-btn:hover {
      background: linear-gradient(135deg, #2ecc71, #239b56);
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(46, 204, 113, 0.4);
    }

    .submit-sale {
      background: linear-gradient(135deg, #4dabf7, #1c7ed6);
      color: white;
      padding: 12px 20px;
      font-size: 16px;
      font-weight: 600;
      border: none;
      border-radius: 10px;
      width: 100%;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .submit-sale:hover {
      background: linear-gradient(135deg, #339af0, #1864ab);
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(52, 152, 219, 0.4);
    }

    .section-title {
      margin: 20px 0 10px;
      font-size: 18px;
      color: #bbbbbb;
      border-bottom: 1px solid rgba(255, 255, 255, 0.08);
      padding-bottom: 5px;
    }

    .delete-btn {
      padding: 8px 10px;
      background: linear-gradient(135deg, #e74c3c, #c0392b);
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 14px;
      transition: all 0.3s ease;
    }

    .delete-btn:hover {
      background: linear-gradient(135deg, #ff6b6b, #d63031);
      transform: scale(1.05);
    }

    /* Mobile: single column */
    @media (max-width: 600px) {
      .grid-row {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2> Quick Sales Entry</h2>
    <form id="salesForm">
      <div class="form-group">
        <label for="customer">Select Customer</label>
        <select name="customer_id" required>
          <option value="" disabled selected hidden>Select a medicine</option>
          <option value="1">John Doe</option>
          <option value="2">Jane Smith</option>
        </select>
      </div>


      <div class="section-title">Medicines</div>

      <div id="medicine-container"></div>

      <button type="button" class="add-medicine-btn" onclick="addMedicineRow()">+ Add Medicine</button>

      <div class="form-group" style="margin-top: 30px;">
        <label for="grand-total">Grand Total</label>
        <input type="number" id="grand-total" name="grand_total" readonly value="0.00">
      </div>

      <button type="submit" class="submit-sale">Confirm Sale</button>
    </form>
  </div>

  <script>
class SalesForm {
  constructor(formId, medicineContainerId, grandTotalId) {
    this.form = document.getElementById(formId);
    this.container = document.getElementById(medicineContainerId);
    this.grandTotal = document.getElementById(grandTotalId);

    this.init();
  }

  init() {
    // Add the first medicine row on page load
    this.addMedicineRow();

    // Optional: handle form submit
    this.form.addEventListener("submit", (e) => {
      e.preventDefault();
      alert("Sale confirmed!"); 
      // Here you could do an AJAX call or regular submit
    });
  }

  addMedicineRow() {
    const row = document.createElement('div');
    row.className = 'grid-row';
    row.innerHTML = `
      <div class="form-group">
        <label>Medicine</label>
        <select name="stock_id[]" required>
          <option value="1" data-price="10">NAPA</option>
          <option value="2" data-price="12">Maxpro</option>
        </select>
      </div>

      <div class="form-group">
        <label>Quantity</label>
        <input type="number" name="quantity[]" min="1" value="1">
      </div>

      <div class="form-group">
        <label>Unit Price</label>
        <input type="number" name="unit_price[]" step="0.01" value="10.00" readonly>
      </div>

      <div class="form-group">
        <label>Total</label>
        <input type="number" name="total[]" step="0.01" value="10.00" readonly>
      </div>

      <div class="form-group">
        <label>&nbsp;</label>
        <button type="button" class="delete-btn">❌</button>
      </div>
    `;

    // Event listeners for this row
    row.querySelector('[name="stock_id[]"]').addEventListener('change', () => this.calculateRowTotal(row));
    row.querySelector('[name="quantity[]"]').addEventListener('input', () => this.calculateRowTotal(row));
    row.querySelector('.delete-btn').addEventListener('click', () => this.removeMedicineRow(row));

    this.container.appendChild(row);
    this.updateGrandTotal();
  }

  calculateRowTotal(row) {
    const qty = parseFloat(row.querySelector('[name="quantity[]"]').value) || 0;
    const select = row.querySelector('[name="stock_id[]"]');
    const price = parseFloat(select.options[select.selectedIndex].dataset.price) || 0;

    row.querySelector('[name="unit_price[]"]').value = price.toFixed(2);
    row.querySelector('[name="total[]"]').value = (qty * price).toFixed(2);

    this.updateGrandTotal();
  }

  updateGrandTotal() {
    let total = 0;
    this.container.querySelectorAll('[name="total[]"]').forEach(input => {
      total += parseFloat(input.value) || 0;
    });
    this.grandTotal.value = total.toFixed(2);
  }

  removeMedicineRow(row) {
    row.remove();
    this.updateGrandTotal();
  }
}

// Initialize after DOM is loaded
window.addEventListener('DOMContentLoaded', () => {
  const salesForm = new SalesForm('salesForm', 'medicine-container', 'grand-total');

  // Keep your existing button working
  document.querySelector('.add-medicine-btn').addEventListener('click', () => {
    salesForm.addMedicineRow();
  });
});
</script>

</body>
</html>


    </div> <!-- content-wrapper ends -->

    <?php include "../includes/footer.php"; ?>
  </div> <!-- main-panel ends -->
</div> <!-- page-body-wrapper ends -->