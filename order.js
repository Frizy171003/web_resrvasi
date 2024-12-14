// Menu prices
const prices = {
  MieGoreng: 9000,
  MieKuah: 11000,
  MieMager: 17000,
  AyamLadoIjo: 14000,
  AyamGeprek: 16000,
  PecelAyam: 14000,
  AyamBakar: 15000,
  NasiSlengekan: 12000,
  NasiDadar: 9000,
};

// Update price function
function updatePrice() {
  let total = 0;

  // Loop through each item and update the price
  const menuItems = [
    "MieGoreng",
    "MieKuah",
    "MieMager",
    "AyamLadoIjo",
    "AyamGeprek",
    "PecelAyam",
    "AyamBakar",
    "NasiSlengekan",
    "NasiDadar",
  ];
  menuItems.forEach((item) => {
    const qty = document.getElementById(item + "Qty").value || 0;
    const price = prices[item];
    const itemPrice = qty * price;
    document.getElementById(item + "Price").textContent =
      "Rp " + itemPrice.toLocaleString();
    total += itemPrice;
  });

  // Update total price
  document.getElementById("totalPrice").textContent = total.toLocaleString();
  document.getElementById("totalAmount").value = total;
}
