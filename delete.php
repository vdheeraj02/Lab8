<?php
require_once './db/conn.php';

function resequence_client_ids_preserving_order(mysqli $conn) {
    
    mysqli_begin_transaction($conn);
    try {
        
        if (!mysqli_query($conn, "CREATE TEMPORARY TABLE client_info_tmp LIKE client_info")) {
            throw new Exception("Create temp failed: " . mysqli_error($conn));
        }

        
        $fill = "
            INSERT INTO client_info_tmp (email, address, city, province, postalcode)
            SELECT email, address, city, province, postalcode
            FROM client_info
            ORDER BY client_id ASC
        ";
        if (!mysqli_query($conn, $fill)) {
            throw new Exception("Fill temp failed: " . mysqli_error($conn));
        }

        
        if (!mysqli_query($conn, "TRUNCATE TABLE client_info")) {
            throw new Exception("Truncate original failed: " . mysqli_error($conn));
        }
        if (!mysqli_query($conn, "ALTER TABLE client_info AUTO_INCREMENT = 1")) {
            throw new Exception("Reset auto_increment failed: " . mysqli_error($conn));
        }

        
        $copyBack = "
            INSERT INTO client_info (email, address, city, province, postalcode)
            SELECT email, address, city, province, postalcode
            FROM client_info_tmp
            ORDER BY client_id ASC
        ";
        if (!mysqli_query($conn, $copyBack)) {
            throw new Exception("Copy back failed: " . mysqli_error($conn));
        }

        mysqli_commit($conn);
        return true;
    } catch (Exception $e) {
        mysqli_rollback($conn);
        
        return false;
    }
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];

    
    $delete_sql = "DELETE FROM client_info WHERE client_id = $id";
    if (!mysqli_query($conn, $delete_sql)) {
        echo "Error deleting record: " . mysqli_error($conn);
        exit;
    }

    
    $res = mysqli_query($conn, "SELECT COUNT(*) AS total FROM client_info");
    $row = mysqli_fetch_assoc($res);
    $total = (int)($row['total'] ?? 0);

    if ($total === 0) {
        
        mysqli_query($conn, "ALTER TABLE client_info AUTO_INCREMENT = 1");
        header("Location: viewrecords.php?msg=deleted");
        exit;
    } else {
        
        resequence_client_ids_preserving_order($conn);
        header("Location: viewrecords.php?msg=deleted");
        exit;
    }
} else {
    echo "Invalid record ID.";
}
