//inisiasi lokal storage
let jokiData = JSON.parse(localStorage.getItem('jokssDataArr')) || [];
let editId = null;

// DOM
const form = document.getElementById('form-joki');
const tableBody = document.getElementById('table-body');
const searchInput = document.getElementById('search-input');
const checkboxes = document.querySelectorAll('.filter-chk');

// arrow function & array methods
const updateStats = (data) => {
    const totalItem = data.length;
    // reduce
    const totalNilai = data.reduce((acc, curr) => acc + (Number(curr.stok) * Number(curr.harga)), 0);
    // filter
    const stokMenipis = data.filter(item => Number(item.stok) < 5).length;

    // DOM Manipulation untuk statistik
    document.getElementById('stat-total').textContent = totalItem;
    document.getElementById('stat-nilai').textContent = totalNilai.toLocaleString('id-ID');
    document.getElementById('stat-menipis').textContent = stokMenipis;
};

// render tabel dari Array of Objects
const renderTable = (data) => {
    tableBody.innerHTML = '';
    
    data.forEach(item => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${item.kode}</td>
            <td>${item.nama}</td>
            <td>${item.kategori}</td>
            <td>${item.stok}</td>
            <td>Rp ${Number(item.harga).toLocaleString('id-ID')}</td>
            <td>${item.tanggal}</td>
            <td>
                <button class="btn-search btn-edit" data-id="${item.id}" style="padding: 6px 12px; margin-right: 5px;">Edit</button>
                <button class="btn-order btn-delete" data-id="${item.id}" style="padding: 6px 12px; background-color: #333;">Hapus</button>
            </td>
        `;
        tableBody.appendChild(tr);
    });

    updateStats(data);
};

// form tambah/edit custom
form.addEventListener('submit', (e) => {
    e.preventDefault();
    
    const kode = document.getElementById('kode').value.trim();
    const nama = document.getElementById('nama').value.trim();
    const kategori = document.getElementById('kategori').value;
    const stok = document.getElementById('stok').value;
    const harga = document.getElementById('harga').value;
    const tanggal = document.getElementById('tanggal').value;
    const errorMsg = document.getElementById('error-msg');

    if (!kode || !nama || !kategori || !stok || !harga || !tanggal) {
        errorMsg.style.display = 'block';
        return;
    }
    errorMsg.style.display = 'none';

    const newData = { 
        id: editId || Date.now().toString(), 
        kode, nama, kategori, stok, harga, tanggal 
    };

    if (editId) {
        // update array & re render
        jokiData = jokiData.map(item => item.id === editId ? newData : item);
        editId = null;
        document.getElementById('btn-submit').textContent = 'Simpan Paket Baru';
    } else {
        // nambah data baru
        jokiData.push(newData);
    }

    //localStorage
    localStorage.setItem('jokssDataArr', JSON.stringify(jokiData));
    form.reset();
    renderFilteredData();
});

// tombol di dalam tabel
tableBody.addEventListener('click', (e) => {
    const id = e.target.getAttribute('data-id');

    // hapus data
    if (e.target.classList.contains('btn-delete')) {
        if (confirm('Yakin mau hapus paket joki ini?')) {
            jokiData = jokiData.filter(item => item.id !== id);
            localStorage.setItem('jokssDataArr', JSON.stringify(jokiData));
            renderFilteredData();
        }
    }

    // edit form + data
    if (e.target.classList.contains('btn-edit')) {
        const item = jokiData.find(d => d.id === id);
        if (item) {
            document.getElementById('kode').value = item.kode;
            document.getElementById('nama').value = item.nama;
            document.getElementById('kategori').value = item.kategori;
            document.getElementById('stok').value = item.stok;
            document.getElementById('harga').value = item.harga;
            document.getElementById('tanggal').value = item.tanggal;
            
            editId = item.id;
            document.getElementById('btn-submit').textContent = 'Update Paket Joki';
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    }
});

// pencarian & filter
const renderFilteredData = () => {
    const keyword = searchInput.value.toLowerCase();
    
    // ambil value dari checkbox aktif
    const checkedCategories = Array.from(checkboxes)
        .filter(chk => chk.checked)
        .map(chk => chk.value);

    // array method filter
    const filtered = jokiData.filter(item => {
        // Psearch
        const matchSearch = item.nama.toLowerCase().includes(keyword) || item.kode.toLowerCase().includes(keyword);
        
        // syarat 6
        const matchCategory = checkedCategories.length === 0 || checkedCategories.includes(item.kategori);
        
        return matchSearch && matchCategory;
    });
    renderTable(filtered);
};

// pencarian realtime
searchInput.addEventListener('input', renderFilteredData);

//checkbox Filter
checkboxes.forEach(chk => {
    chk.addEventListener('change', renderFilteredData);
});

// render pertama kali
renderFilteredData();