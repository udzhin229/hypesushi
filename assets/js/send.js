// function mySend() {
//     const parentBlock = document.getElementById('elements-order');
//     if (parentBlock.querySelector('.element-o')) {
//         const elements = document.querySelectorAll('.el-title');
//         const total = document.querySelectorAll('.el-total');
    
//         const titles = Array.from(elements).map(element => element.textContent);
//         const totals = Array.from(total).map(element => element.textContent);
//         const values = titles.map((title, index) => `${title} - ${totals[index]}`);
//         const text = values.join(', ');
    
//         document.getElementById('hid').value = text;
//     }
//     else {
//         alert('Корзина пуста');
//         return false;
//     }
// }
const form = document.getElementById('reqform');

form.addEventListener('submit', function(event) {
  const parentBlock = document.getElementById('elements-order');
  if (!parentBlock.querySelector('.element-o')) {
    event.preventDefault();
    alert('Корзина пуста');
    return false;
  }
  
  const elements = document.querySelectorAll('.el-title');
  const total = document.querySelectorAll('.el-total');
  const price = document.getElementById('totalprice').textContent;
  
  const titles = Array.from(elements).map(element => element.textContent);
  const totals = Array.from(total).map(element => element.textContent);
  const values = titles.map((title, index) => `${title} - ${totals[index]}`);
  const text = values.join(',\n');
  
  document.getElementById('hid').value = text;
  document.getElementById('price').value = price;
});

const form1 = document.getElementById('reqform1');

form1.addEventListener('submit', function(event) {
  const parentBlock = document.getElementById('elements-order');
  if (!parentBlock.querySelector('.element-o')) {
    event.preventDefault();
    alert('Корзина пуста');
    return false;
  }
  
  const elements = document.querySelectorAll('.el-title');
  const total = document.querySelectorAll('.el-total');
  const price = document.getElementById('totalprice').textContent;
  
  const titles = Array.from(elements).map(element => element.textContent);
  const totals = Array.from(total).map(element => element.textContent);
  const values = titles.map((title, index) => `${title} - ${totals[index]}`);
  const text = values.join(',\n');
  
  document.getElementById('hid1').value = text;
  document.getElementById('price1').value = price;
});