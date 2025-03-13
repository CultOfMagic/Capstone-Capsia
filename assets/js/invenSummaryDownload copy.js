function exportToPDF() {
    const { jsPDF } = window.jspdf;

    const doc = new jsPDF('landscape');

    // download table content + replace images with alt text
    const table = document.getElementById("invenTable");
    const rows = Array.from(table.rows);

    // convert table rows into data format required by autoTable
    const tableData = rows.map((row) =>
        Array.from(row.cells).map((cell) => {
            const img = cell.querySelector("img");
            return img && img.alt ? img.alt : cell.innerText.trim();
        })
    );

    // extract header separately
    const tableHeaders = Array.from(rows[0].cells).map((cell) => cell.innerText.trim());

    // use autoTable to generate the table in the PDF
    doc.autoTable({
        head: [tableHeaders], // Header row
        body: tableData.slice(1), // Data rows (excluding the header)
        startY: 10, // Vertical start position
        styles: {
            fontSize: 10,
            cellPadding: 2,
            overflow: "linebreak",
        },
        headStyles: { fillColor: [30, 47, 34], textColor: [255, 255, 255] }, // Dark green header with white text
        alternateRowStyles: { fillColor: [245, 245, 245] }, // Light gray for alternate rows
        margin: { top: 20 }, // Top margin
    });

    // script for current date stamp
    const today = new Date();
    const formattedDate = today.toISOString().split("T")[0]; // YYYY-MM-DD
     
    // download
    doc.save(`Inventory_Summary_as_of_${formattedDate}.pdf`);
}


    // Export to Excel
    function exportToExcel() {
    const table = document.getElementById("invenTable");
    const rows = Array.from(table.rows).map((row) => {
        return Array.from(row.cells).map((cell) => {
            const img = cell.querySelector("img");
            return img && img.alt ? img.alt : cell.innerText.trim();
        });
    });

    // creating worksheet and workbook
    const ws = XLSX.utils.aoa_to_sheet(rows);
    const wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Sheet1");

     // script for current date stamp
     const today = new Date();
     const formattedDate = today.toISOString().split("T")[0]; // YYYY-MM-DD
 
     // download
     XLSX.writeFile(wb, `Inventory_Summary_as_of_${formattedDate}.xlsx`);
}