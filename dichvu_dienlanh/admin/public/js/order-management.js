const form = document.getElementById("filter-form");
const startTime = form.querySelector(".start-day");
const endTime = form.querySelector(".end-day");
const status = form.querySelector("select");
const search = form.querySelector(".search-container input");
const searchBtn = form.querySelector(".search-container .search-icon");
const paginations = document.querySelector(".paginations");

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
function renderPagination() {
  for (let i = 1; i <= 5; i++) {
    const paginBtn = `
    <div class="pagination-item">
      ${i}
    </div>
    `;
    paginations.innerHTML += paginBtn;
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

// handle get data by ajax
window.onload = function () {
  renderPagination();
  const paginationItems = document.querySelectorAll(".pagination-item");
  console.log(paginationItems)
  paginationItems.forEach((element, index) => {
    element.addEventListener("click", function () {
      submitFilter(index+1);
    });
  });
  callAjax("?c=dashboard&a=getAll&from_date=&to_date=&page=1&search=");
};

function callAjax(pathvariable) {
  let url = window.location.href + pathvariable;
  let xhr = new XMLHttpRequest();
  xhr.onload = function () {
    let data = JSON.parse(this.responseText);
    console.log(data);
    document.getElementById("tbody-order-table").innerHTML =
      createRowElement(data);
  };
  xhr.open("get", url, true);
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
            <td>${item.ThoiGianKT}</td>
            <td>${item.TrangThai}</td>
            <td>${item.SoLuong}</td>
            <td>${item.ThanhTien}vnđ</td>
            <td>
              <div class="button-container">
                <div class="button-options">
                    <a href="/admin/?c=dashboard&a=edit&MaDH=${item.MaDH}">
                      <img src="../../admin/public/assest/icons/edit.png" alt="" />
                    </a>
                </div>
                <div class="button-options">
                    <a href="./order-detail-admin.html">
                      <img src="../../admin/public/assest/icons/trash-bin.png" alt="" />
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
