// ----------------------------------------------------------------------

const form = document.getElementById("filter-form");
const startTime = form.querySelector(".start-day");
const endTime = form.querySelector(".end-day");
const status = form.querySelector("select");
const search = form.querySelector(".search-container input");
const searchBtn = form.querySelector(".search-container .search-icon");
const paginationItemPrev = document.getElementById("pagination-item-prev");
const paginationItemNext = document.getElementById("pagination-item-next");
const paginationContainer = document.getElementById("paginations-number");

searchBtn.addEventListener("click", function () {
  submitFilter();
});

status.addEventListener("change", function () {
  submitFilter();
});

startTime.addEventListener("change", function () {
  submitFilter();
});

endTime.addEventListener("change", function () {
  submitFilter();
});

function submitFilter(page = 1) {
  const startTimeValue = formatDate(startTime.value).trim();
  const endTimeValue = formatDate(endTime.value).trim();
  const statusValue = status.value;
  const searchValue = search.value.trim();

  callAjax(
    `?c=dashboard&a=getAll&from_date=${startTimeValue}&to_date=${endTimeValue}&search=${searchValue}&TrangThai=${statusValue}&page=${page}`
  );
}

//render pagination
// --------------------------------------------------
function renderPagination(total_pages) {
  for (let i = 1; i <= total_pages; i++) {
    const paginBtn = `
    <div class="pagination-item">
      ${i}
    </div>
    `;
    paginationContainer.innerHTML += paginBtn;
  }
}

// ------------------------Utils function-----------------------------------
function formatDate(date) {
  if (!date) {
    return " ";
  }
  return new Date(date).toLocaleDateString("en-US");
}

function html([first, ...strings], ...values) {
  return values
    .reduce((acc, cur) => acc.concat(cur, strings.shift()), [first])
    .filter((x) => (x && x !== true) || x === 0)
    .join(" ");
}

const typeOf = (value) => Object.prototype.toString.call(value).slice(8, -1);
// --------------------------------------------------------------------------
function myResponseCallback(data){
  if (data){
    const myResponse = JSON.parse(data.currentTarget.response);
    console.log(myResponse);  
    document.getElementById("tbody-order-table").innerHTML = createRowElement(myResponse.orders);
  }  
}

function callAjax(pathvariable) {
  let url = window.location.href + pathvariable;
  let xhr = new XMLHttpRequest();
  xhr.onload = myResponseCallback,
  xhr.open("get", url);
  xhr.send();
}




function createRowElement(data) {
  if (typeOf(data) === "Array") {
    return html`
      ${data.map((item) => {
        return `
          <tr>
            <td>${item.MaDH}</td>
            <td>${item.MaDangKy}</td>
            <td>${item.TenDV}</td>
            <td>${item.TenKH}</td>
            <td>${item.DienThoai}</td>
            <td>${item.DiaChi}</td>
            <td>${item.ThoiGianBD}</td>
            <td>${item.ThoiGianKT === null ? "Trống" : item.ThoiGianKT}</td>
            <td>${item.TrangThai}</td>
            <td>${item.SoLuong}</td>
            <td>${item.ThanhTien} vnđ</td>
            <td>
              <div class="button-container">
                <div class="button-options">
                    <a href="/admin/?c=dashboard&a=edit&MaDH=${item.MaDH}">
                      <img src="../../admin/public/assest/icons/edit.png" alt="" />
                    </a>
                </div>
              </div>
            </td>
          </tr>
          `;
      })}
    `;
  }
}

// --------------------------ONLOAD EVENT----------------------------------
window.onload = function () {
  renderPagination(5);
  const paginationItems = document.querySelectorAll(".pagination-item");

  paginationItems.forEach((element, index) => {
    element.addEventListener("click", function () {
      submitFilter(index + 1);
      $(".pagination-item").removeClass("active");
      this.classList.add("active");
    });
  });
  // handle get data by ajax
  callAjax("?c=dashboard&a=getAll&from_date=&to_date=&page=1&search=");
};
