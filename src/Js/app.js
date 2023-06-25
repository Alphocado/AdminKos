// Ambil elemen-elemen yang diperlukan
const buyButtons = document.querySelectorAll('.buy-btn');
const cartItems = document.querySelector('.cart-items');
const totalPrice = document.getElementById('total-price');
const totalHari = document.getElementById('total-hari');
const checkoutBtn = document.getElementById('checkout-btn');



let cartTotal = 0;
let hariCount = 0;
let jumlahRow = 0;

// Tambahkan event listener ke setiap tombol 'Booking'
buyButtons.forEach(button => {
  button.addEventListener('click', () => {
    const product = button.parentNode;
    const productName = product.querySelector('h3').textContent;
    const jumlahHari = parseInt(product.querySelector('#jumlah-hari').value);
    const productPrice = parseInt(product.querySelector('.buy-btn').dataset.price);
    addItemToCart(productName, productPrice, jumlahHari);
    updateTotal();
  });
});

// Tambahkan item ke keranjang
function addItemToCart(name, price, hari) {
  if(isNaN(hari)){
    hari = 0;
  }
  if(hari > 0) {
    hariCount = hariCount + hari;
    price = price * hari;
  } else {
    hariCount++;  
    hari++;
  }
  
  const ul = document.createElement('ul');
  const li1 = document.createElement('li');
  const li2 = document.createElement('li');
  const li3 = document.createElement('li');
  li1.textContent = `${name}`;
  li2.textContent = `${price}`;
  li3.textContent = `${hari}`;

  
  const input1 = document.createElement('input');
  const input2 = document.createElement('input');
  const input3 = document.createElement('input');

  input1.setAttribute("type", "hidden");
  input2.setAttribute("type", "hidden");
  input3.setAttribute("type", "hidden");

  input1.setAttribute("name", "input["+jumlahRow+"][0]");
  input2.setAttribute("name", "input["+jumlahRow+"][1]");
  input3.setAttribute("name", "input["+jumlahRow+"][2]");

  if(name == "Kamar Satu"){
    gName = "kamar_satu";
  } else if(name == "Kamar Dua"){
    gName = "kamar_dua";
  } else if(name == "Kamar Tiga"){
    gName = "kamar_tiga";
  }
  input1.setAttribute("value", `${gName}`);
  input2.setAttribute("value", `${price}`);
  input3.setAttribute("value", `${hari}`);

  li1.appendChild(input1);
  li2.appendChild(input2);
  li3.appendChild(input3);

  ul.appendChild(li1);
  ul.appendChild(li2);
  ul.appendChild(li3);
  cartItems.appendChild(ul);
  
  cartTotal += price;
  jumlahRow++;
}

// Update total biaya dan jumlah hari
function updateTotal() {
  totalPrice.textContent = `Rp${cartTotal}`;
  totalHari.textContent = hariCount;
}

// Checkout
function checkout() {

  alert(`Total biaya: Rp${cartTotal}\nJumlah hari: ${hariCount}`);
  // Lakukan proses checkout yang sesuai di sini
  // Misalnya, mengirim data ke server atau melanjutkan ke halaman pembayaran
  // Setelah checkout, bisa di-reset keranjangnya dengan memanggil fungsi resetCart()
}

// Reset keranjang
function resetCart() {
  cartItems.innerHTML = '';
  cartTotal = 0;
  hariCount = 0;
  updateTotal();
}

// Menggunakan event listener untuk tombol 'Checkout'
checkoutBtn.addEventListener('click', checkout);
