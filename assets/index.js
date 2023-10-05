const addCustomerForm = document.querySelector("#add-customer-form");
const addCustomerBtn = document.querySelector("#add-customer-btn");
const addCustomerBtnClose = document.querySelector("#add-customer-btn-close");

console.log(addCustomerBtn, addCustomerForm);

addCustomerBtn.addEventListener('click', () => {
    addCustomerForm.showModal();
})

addCustomerBtnClose.addEventListener('click', () => {
    addCustomerForm.close();
})