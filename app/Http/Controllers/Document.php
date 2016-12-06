<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tai_khoan;
use App\sinh_vien;
use App\de_tai;
use App\giang_vien;
use Carbon\Carbon;

class Document extends Controller
{
    public function ExportStudent(){
    	$curr = Carbon::now();
    	$time = ($curr->year)."-".($curr->month)."-".($curr->day);
    	$filename="danh-sach-".$time.".docx";
        $PHPWord = new \PhpOffice\PhpWord\PhpWord();
// New portrait section
        $section = $PHPWord->addSection();
// Define table style arrays
        $styleTable = array('borderSize'=>6, 'borderColor'=>'006699', 'cellMargin'=>80);
        $styleFirstRow = array('borderBottomSize'=>18, 'borderBottomColor'=>'0000FF', 'bgColor'=>'66BBFF');
// Define cell style arrays
        $styleCell = array('valign'=>'center');
        $styleCellBTLR = array('name'=>'Verdana', 'size'=>14, 'color'=>'1B2232', 'valign'=>'center');
// Define font style for first row
        $fontStyle = array('bold'=>true, 'align'=>'center');
        $LabelStyle = array('bold'=>true, 'valign'=>'center', 'size'=>'25');
// Add table style
        $PHPWord->addTableStyle('myOwnTableStyle', $styleTable, $styleFirstRow);
        $section->addText("DANH SÁCH SINH VIÊN BẢO VỆ", $LabelStyle);
        $section->addText("==========================");
        $section->addText("Ngày: ".$time, $fontStyle);
// Add table
        $table = $section->addTable('myOwnTableStyle');
// Add row
        $table->addRow(900);
// Add cells
        $table->addCell(200, $styleCell)->addText('STT', $fontStyle);
        $table->addCell(1500, $styleCell)->addText('MSSV', $fontStyle);
        $table->addCell(3500, $styleCell)->addText('Họ và tên', $fontStyle);
        $table->addCell(4000, $styleCell)->addText('Tên đề tài', $fontStyle);
        $table->addCell(3500, $styleCell)->addText('Người hướng dẫn', $fontStyle);
        $table->addCell(1000, $styleCell)->addText('Ghi chú', $fontStyle);
// Add more rows / cells
        $sinh_viens = array();
        $id_khoa=2;
        $sinh_viens = sinh_vien::where("id_khoa",$id_khoa)->where("tt_dang_ky",1)->get();
        $i = 1;
        foreach($sinh_viens as $sinh_vien) {
            $id_de_tai = $sinh_vien->id_de_tai;
            $de_tai = de_tai::where('id', $id_de_tai)->first();
                $table->addRow();
                $table->addCell(200)->addText("$i");
                $sv  = tai_khoan::where('id', $sinh_vien->id)->first();
                $table->addCell(1500)->addText("$sv->username");
                $table->addCell(3500)->addText("$sv->ten_rieng");
                $table->addCell(4000)->addText("$de_tai->ten");
                $giang_vien = tai_khoan::where('id',$de_tai->id_giang_vien)->first();
                $table->addCell(3500)->addText("$giang_vien->ten_rieng");
                $table->addCell(1000);
                $i++;
        }
// Save File
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($PHPWord, 'Word2007');
        $objWriter->save($filename);
        \Session::flash("flash_mess","Export successfully!");
        return redirect()->back();
    }
}
