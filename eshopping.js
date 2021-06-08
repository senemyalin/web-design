class Book {
  constructor(pic, name, info, price) {
    this.picture = pic;
    this.name = name;
    this.information = info;
    this.price = price;
  }
}

var booklist = localStorage.getItem("booklist");
if (booklist != null) {
  booklist = JSON.parse(booklist);
  bookList();
} else
  booklist = [];

var booklistinbasket = localStorage.getItem("basket");
if (booklistinbasket != null) {
  booklistinbasket = JSON.parse(booklistinbasket);
  displaybasket();
} else
  booklistinbasket = {};

function createNewBook() {
  var pic = document.getElementById("Picture").value;
  var name = document.getElementById("Name").value;
  var info = document.getElementById("Information").value;
  var price = document.getElementById("Price").value;

  var newBook = new Book(pic, name, info, price);
  booklist.push(newBook);
  localStorage.setItem("booklist", JSON.stringify(booklist));
  document.getElementById("Picture").value = "";
  document.getElementById("Name").value = "";
  document.getElementById("Information").value = "";
  document.getElementById("Price").value = "";
  bookList();
}

function getTotalPrice() {
  myList = "<table>\n" +
    "  <tr>\n" +
    "  <th>Book Name</th>\n" +
    "  <th>Price</th>\n" +
    "  <th>Amount</th>\n" +
    "  <th>total</th>\n" +
    "  </tr> ";
  var total = 0;
  for (let i in booklistinbasket) {
    total += parseInt(booklistinbasket[i].price) * booklistinbasket[i].amount;
    myList += "<tr> " +
      "<td>" + booklistinbasket[i].name + "</td>" +
      "<td>" + booklistinbasket[i].price + "$ </td>" +
      "<td>" + booklistinbasket[i].amount + " </td>" +
      "<td>" + booklistinbasket[i].amount*booklistinbasket[i].price + "$ </td>" +
      "</tr>";
  }
  myList += "</table>";
  document.getElementById("shoppingBagList").innerHTML = myList;
  document.getElementById("totalPrice").innerHTML = "Total price: $" + total;

}

function display() {
  document.getElementById("p2").innerHTML = booklist;

}

function displaybasket() {
  let basket = localStorage.getItem("basket") || "{}";
  if (basket!=='{}') {
    basket=JSON.parse(basket);
    document.getElementById("shoppingBag").innerText = "Shopping Bag (" + Object.keys(basket).length+ ")";
  }
}

function bookList() {
  if (!document.getElementById("p2"))
    return;
  let myList = "<div class=\"container\" style=\"margin-top: 20mm\">\n" +
    "    <div class=\"row\">";

  for (i = 0; i < booklist.length; i++) {
    myList += `
        <div class="col-3" style="    padding: 10px;border-radius: 15px;box-shadow: white 0 0 4px 0;margin-left:15px; text-align: center;"> 
            <div class="card" style="text-align: center; background: gray; box-shadow: purple -1px 2px 5px 0;"> 
                <h4>${booklist[i].name}</h4>
            </div>
            <div class="card-body">
                <img src="${booklist[i].picture}" style="width:70%" />
                <p style="max-height: 150px; overflow-y:auto" >${booklist[i].information}</p>
            </div>
    
            <div class="card-footer">
                <p>Price : ${booklist[i].price}$</p>
                <button class="btn-danger" type="button" onclick="addToBasket(${i})">Add to basket</button>
            </div>
        </div>`;
  }
  myList += `</div></div>`;
  document.getElementById("p2").outerHTML = myList;

}