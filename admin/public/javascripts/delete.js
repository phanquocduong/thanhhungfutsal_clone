function deleteCategory(id) {
    var kq = confirm("Bạn có chắc chắn muốn xóa không?");
    if (kq) {
        window.location.href = `index.php?page=handle-deletecate&id=${id}`;
    }
}

function deleteProduct(id) {
    var kq = confirm("Bạn có chắc chắn muốn xóa không?");
    if (kq) {
        window.location.href = `index.php?page=handle-deletepro&id=${id}`;
    }
}

function deleteUser(id) {
    var kq = confirm("Bạn có chắc chắn muốn xóa không?");
    if (kq) {
        window.location.href = `index.php?page=handle-deleteuser&id=${id}`;
    }
}