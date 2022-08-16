const SideBar = document.getElementById('SideBar');
const DashBoard = document.getElementById('DashBoard');
const ManuBtn = document.getElementById('ManuBtn');

ManuBtn.onclick = () => {
    SideBar.classList.toggle('Active');
    DashBoard.classList.toggle('Active');
    ManuBtn.classList.toggle('Active');
}