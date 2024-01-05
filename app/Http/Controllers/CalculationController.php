<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculationController extends Controller
{
    public function hitung(Request $request)
    {
    
        // Ambil data dari formulir ,laki(udh nikah)
        $jenisKelamin = $request->input('gender');
        $status = $request->input('status');
        $anaklaki = $request->input('anaklaki');
        $anakperempuan = $request->input('anakperempuan');
        $ibu = $request->input('ibu');
        $bapak = $request->input('bapak');
        $istri = $request->input('istri');
        $saudaralaki = $request->input('saudaralaki');
        $saudaraperempuan = $request->input('saudaraperempuan');
        $totalWarisan = $request->input('harta');
        $totalson = (int) $request->input('jumlahson1',0);
        $totaldaughter = (int) $request->input('jumlahdaughter1',0);
        $totalson2 = (int) $request->input('jumlahson',0);
        $totaldaughter2 = (int) $request->input('jumlahdaughter',0);


        //dd($totalson, $totaldaughter);

        // Lakukan perhitungan sesuai dengan formula perbandingan 2:1
   
        if ($totalson > 0 && $totaldaughter > 0) {
            // Menggunakan perbandingan 2:1
            $totalRasio = $totalson * 2 + $totaldaughter;
        }

        if ($totalson2 > 0 && $totaldaughter2 > 0) {
            // Menggunakan perbandingan 2:1
            $totalRasio2 = $totalson2 * 2 + $totaldaughter2;
        }
        

        $bagianAnakLaki = 0;
        $bagianAnakPerempuan = 0;
        $bagianIbu = 0;
        $bagianBapak = 0;
        $bagianIstri = 0;
        $bagianSaudaraLaki = 0;
        $bagianSaudaraPerempuan = 0;
        
        
        // Hitung persentase harta untuk setiap anggota keluarga
        // Menghitung pembagian warisan berdasarkan kondisi keluarga yang tersisa
        switch (true) {
        case ($istri && $anakperempuan && $ibu && $anaklaki && $bapak && $saudaralaki && $saudaraperempuan):
                $bagianIstri = round($totalWarisan * (9/72),2);
                $bagianIbu = round($totalWarisan * (12/72),2);               
                $bagianBapak = round($totalWarisan * (12/72),2);
                $bagianAnakLaki = round((($totalWarisan - ($bagianIbu + $bagianIstri + $bagianBapak)) * 2) / $totalRasio * $totalson ,2);
                $bagianAnakPerempuan = round((($totalWarisan - ($bagianIbu + $bagianIstri + $bagianBapak)) * 1) / $totalRasio * $totaldaughter ,2); 
                $bagianSaudaraLaki = $totalWarisan * (0);
                $bagianSaudaraPerempuan = $totalWarisan * (0);
                break;
                
                dd("$bagianBapak");
        
                //6
        case ($istri && $anakperempuan && $ibu && $bapak && $saudaralaki && $saudaraperempuan):
                $bagianIstri = round($totalWarisan * (3/24),2);
                $bagianAnakPerempuan = round($totalWarisan * (12/24),2);
                $bagianIbu = round($totalWarisan * (4/24),2);
                $bagianBapak = round($totalWarisan * (5/24),2);
                $bagianSaudaraLaki = $totalWarisan * (0);
                $bagianSaudaraPerempuan = $totalWarisan * (0);
                break;
        
        case ($istri && $anaklaki && $ibu && $bapak && $saudaralaki && $saudaraperempuan):
                $bagianIstri = round($totalWarisan * (3/24),2);
                $bagianAnakLaki = round($totalWarisan * (13/24),2);
                $bagianIbu = round($totalWarisan * (4/24),2);
                $bagianBapak = round($totalWarisan * (4/24),2);
                $bagianSaudaraLaki = $totalWarisan * (0);
                $bagianSaudaraPerempuan = $totalWarisan * (0);
                break;
        
            case ($istri && $anakperempuan && $anaklaki && $bapak && $saudaralaki && $saudaraperempuan):
                    $bagianIstri = round($totalWarisan * (9/72),2);
                    $bagianBapak = round($totalWarisan * (12/72),2);
                    $bagianAnakPerempuan = round((($totalWarisan - ($bagianIstri + $bagianBapak)) * 1) / $totalRasio * $totaldaughter ,2); 
                    $bagianAnakLaki = round((($totalWarisan - ($bagianIstri + $bagianBapak)) * 2) / $totalRasio * $totalson ,2);
                    $bagianSaudaraLaki = $totalWarisan * (0);
                    $bagianSaudaraPerempuan = $totalWarisan * (0);
                    break;
        
            case ($istri && $anakperempuan && $anaklaki && $ibu && $saudaralaki && $saudaraperempuan):
                    $bagianIstri = round($totalWarisan * (9/72),2);
                    $bagianIbu = round($totalWarisan * (12/72),2);
                    $bagianAnakPerempuan = round((($totalWarisan - ($bagianIstri + $bagianIbu)) * 1) / $totalRasio * $totaldaughter ,2); 
                    $bagianAnakLaki = round((($totalWarisan - ($bagianIstri + $bagianIbu)) * 2) / $totalRasio * $totalson ,2);
                    $bagianSaudaraLaki = $totalWarisan * (0);
                    $bagianSaudaraPerempuan = $totalWarisan * (0);
                    break;

            case ($bapak && $anakperempuan && $anaklaki && $ibu && $saudaralaki && $saudaraperempuan):
                    $bagianBapak = round($totalWarisan * (3/18),2);
                    $bagianIbu = round($totalWarisan * (3/18),2);
                    $bagianAnakPerempuan = round((($totalWarisan - ($bagianBapak + $bagianIbu)) * 1) / $totalRasio * $totaldaughter ,2); 
                    $bagianAnakLaki = round((($totalWarisan - ($bagianBapak + $bagianIbu)) * 2) / $totalRasio * $totalson ,2);
                    $bagianSaudaraLaki = $totalWarisan * (0);
                    $bagianSaudaraPerempuan = $totalWarisan * (0);
                    break;
            
            case ($bapak && $anakperempuan && $anaklaki && $ibu && $istri && $saudaraperempuan):
                    $bagianBapak = round($totalWarisan * (3/18),2);
                    $bagianIbu = round($totalWarisan * (3/18),2);
                    $bagianIstri = $totalWarisan * (0);
                    $bagianAnakPerempuan = round((($totalWarisan - ($bagianBapak + $bagianIbu)) * 1) / $totalRasio * $totaldaughter ,2); 
                    $bagianAnakLaki = round((($totalWarisan - ($bagianBapak + $bagianIbu)) * 2) / $totalRasio * $totalson ,2);
                    $bagianSaudaraPerempuan = $totalWarisan * (0);
                    break;
            
            case ($bapak && $anakperempuan && $anaklaki && $ibu && $istri && $saudaralaki):
                    $bagianBapak = round($totalWarisan * (3/18),2);
                    $bagianIbu = round($totalWarisan * (3/18),2);
                    $bagianIstri = $totalWarisan * (0);
                    $bagianAnakPerempuan = round((($totalWarisan - ($bagianBapak + $bagianIbu)) * 1) / $totalRasio * $totaldaughter ,2); 
                    $bagianAnakLaki = round((($totalWarisan - ($bagianBapak + $bagianIbu)) * 2) / $totalRasio * $totalson ,2); 
                    $bagianSaudaraLaki = $totalWarisan * (0);
                    break;


                
                    //5
                case ($bapak && $ibu && $istri && $saudaralaki && $saudaraperempuan):
                        $bagianBapak = round($totalWarisan * (2/4),2);
                        $bagianIbu = round($totalWarisan * (3/4),2);
                        $bagianIstri = round($totalWarisan * (1/4),2);
                        $bagianSaudaraLaki = $totalWarisan * (0);
                        $bagianSaudaraPerempuan = $totalWarisan * (0);
                        break;
                
                case ($bapak && $saudaraperempuan && $istri && $saudaralaki && $anaklaki):
                        $bagianBapak = round($totalWarisan * (4/24),2);
                        $bagianAnakLaki = round($totalWarisan * (17/24),2);
                        $bagianIstri = round($totalWarisan * (3/24),2);
                        $bagianSaudaraLaki = $totalWarisan * (0);
                        $bagianSaudaraPerempuan = $totalWarisan * (0);
                        break;
                
                case ($anakperempuan && $saudaraperempuan && $istri && $saudaralaki && $anaklaki):
                        $bagianIstri = round($totalWarisan * (3/24),2);
                        $bagianAnakPerempuan = round((($totalWarisan - $bagianIstri)  * 1) / $totalRasio * $totaldaughter ,2); 
                        $bagianAnakLaki = round((($totalWarisan - $bagianIstri) * 2) / $totalRasio * $totalson ,2);
                        $bagianSaudaraLaki = $totalWarisan * (0);
                        $bagianSaudaraPerempuan = $totalWarisan * (0);
                        break;
                
                case ($anakperempuan && $saudaraperempuan && $ibu && $saudaralaki && $anaklaki):
                        $bagianIbu = round($totalWarisan * (3/18),2);
                        $bagianAnakPerempuan = round((($totalWarisan - $bagianIbu)  * 1) / $totalRasio * $totaldaughter ,2); 
                        $bagianAnakLaki = round((($totalWarisan - $bagianIbu) * 2) / $totalRasio * $totalson ,2);
                        $bagianSaudaraLaki = $totalWarisan * (0);
                        $bagianSaudaraPerempuan = $totalWarisan * (0);
                        break;
                
                case ($anakperempuan && $saudaraperempuan && $ibu && $bapak && $anaklaki):
                        $bagianIbu = round($totalWarisan * (3/18),2);
                        $bagianBapak = round($totalWarisan * (3/18),2);
                        $bagianAnakPerempuan = round((($totalWarisan - ($bagianIbu + $bagianBapak))   * 1) / $totalRasio * $totaldaughter ,2); 
                        $bagianAnakLaki = round((($totalWarisan - ($bagianIbu + $bagianBapak)) * 2) / $totalRasio * $totalson ,2);
                        $bagianSaudaraPerempuan = $totalWarisan * (0);
                        break;
                
                case ($anakperempuan && $istri && $ibu && $bapak && $anaklaki):
                        $bagianIbu = round($totalWarisan * (12/72),2);
                        $bagianIstri = round($totalWarisan * (9/72),2);
                        $bagianBapak = round($totalWarisan * (12/72),2);
                        $bagianAnakPerempuan = round((($totalWarisan - ($bagianIbu + $bagianBapak + $bagianIstri))   * 1) / $totalRasio * $totaldaughter ,2); 
                        $bagianAnakLaki = round((($totalWarisan - ($bagianIbu + $bagianBapak + $bagianIstri)) * 2) / $totalRasio * $totalson ,2);
                        break;
                
                case ($anakperempuan && $istri && $ibu && $bapak && $saudaralaki):
                        $bagianAnakPerempuan = round($totalWarisan * (12/24),2);
                        $bagianIbu = round($totalWarisan * (4/24),2);
                        $bagianIstri = round($totalWarisan * (3/24),2);
                        $bagianBapak = round($totalWarisan * (5/24),2);
                        $bagianSaudaraLaki = $totalWarisan * (0);
                        break;



                        //4
                    case ($istri && $saudaralaki && $bapak && $saudaraperempuan):
                            $bagianSaudaraLaki = $totalWarisan * (0);
                            $bagianSaudaraPerempuan = $totalWarisan * (0);
                            $bagianIstri = round($totalWarisan * (1/4),2);
                            $bagianBapak = round($totalWarisan * (3/4),2);
                            break;
                    
                    case ($istri && $saudaralaki && $anaklaki && $saudaraperempuan):
                            $bagianSaudaraLaki = $totalWarisan * (0);
                            $bagianSaudaraPerempuan = $totalWarisan * (0);
                            $bagianIstri = round($totalWarisan * (1/8),2);
                            $bagianAnakLaki = round($totalWarisan * (7/8),2);
                            break;
                    
                    case ($anakperempuan && $saudaralaki && $anaklaki && $saudaraperempuan):
                            $bagianSaudaraLaki = $totalWarisan * (0);
                            $bagianSaudaraPerempuan = $totalWarisan * (0);
                            $bagianAnakLaki = round(($totalWarisan * 2) / $totalRasio * $totalson ,2);
                            $bagianAnakPerempuan = round(($totalWarisan * 1) / $totalRasio * $totaldaughter ,2);
                            break;
                    
                    case ($anakperempuan && $ibu && $anaklaki && $saudaraperempuan):
                            $bagianIbu = round($totalWarisan * (3/18),2);
                            $bagianSaudaraPerempuan = round($totalWarisan * (0),2);
                            $bagianAnakPerempuan = round((($totalWarisan - $bagianIbu )   * 1) / $totalRasio * $totaldaughter ,2); 
                            $bagianAnakLaki = round((($totalWarisan - $bagianIbu)  * 2) / $totalRasio * $totalson ,2);
                            break;
                    
                    case ($anakperempuan && $ibu && $anaklaki && $bapak):
                            $bagianIbu = round($totalWarisan * (3/18),2);
                            $bagianBapak = round($totalWarisan * (3/18),2);
                            $bagianAnakPerempuan = round((($totalWarisan - ($bagianIbu + $bagianBapak ))   * 1) / $totalRasio * $totaldaughter ,2); 
                            $bagianAnakLaki = round((($totalWarisan - ($bagianIbu + $bagianBapak )) * 2) / $totalRasio * $totalson ,2);
                            break;
                    
                    case ($saudaralaki && $ibu && $istri && $bapak):
                            $bagianIbu = round($totalWarisan * (1/4),2);
                            $bagianBapak = round($totalWarisan * (2/4),2);
                            $bagianSaudaraLaki = $totalWarisan * (0);
                            $bagianIstri = round($totalWarisan * (1/4),2);
                            break;
                    
                    case ($saudaralaki && $ibu && $istri && $bapak):
                            $bagianIbu = round($totalWarisan * (1/4),2);
                            $bagianBapak = round($totalWarisan * (2/4),2);
                            $bagianSaudaraLaki = $totalWarisan * (0);
                            $bagianIstri = round($totalWarisan * (1/4),2);
                            break;
                            

                            //3
                        case ($anaklaki && $anakperempuan && $ibu):
                                $bagianIbu = round($totalWarisan * (3/18),2);
                                $bagianAnakLaki = round((($totalWarisan - $bagianIbu) * 2) / $totalRasio * $totalson ,2);                                
                                $bagianAnakPerempuan = round((($totalWarisan - $bagianIbu) *1) / $totalRasio * $totaldaughter ,2);
                                break;
                        
                        case ($bagianBapak && $anakperempuan && $ibu):
                                $bagianIbu = round($totalWarisan * (1/6),2);
                                $bagianBapak = round($totalWarisan * (2/6),2);
                                $bagianAnakPerempuan = round($totalWarisan * (3/6),2);
                                break;
                        
                        case ($bagianBapak && $istri && $ibu):
                                $bagianIbu = round($totalWarisan * (1/4),2);
                                $bagianBapak = round($totalWarisan * (2/4),2);
                                $bagianIstri = round($totalWarisan * (1/4),2);
                                break;
                        
                        case ($bagianBapak && $istri && $saudaralaki):
                                $bagianSaudaraLaki = $totalWarisan * (0);
                                $bagianBapak = round($totalWarisan * (3/4),2);
                                $bagianIstri = round($totalWarisan * (1/4),2);
                                break;
                        
                        case ($bagianSaudaraPerempuan && $anaklaki && $saudaralaki):
                                $bagianSaudaraLaki = $totalWarisan * (0);
                                $bagianSaudaraPerempuan = $totalWarisan * (0);
                                $bagianAnakLaki = $totalWarisan * (1/1);
                                break;
                        
                        case ($bagianSaudaraPerempuan && $anaklaki && $anakperempuan):
                                $bagianAnakPerempuan = round($totalWarisan * (1/3),2);
                                $bagianSaudaraPerempuan = $totalWarisan * (0);
                                $bagianAnakLaki = round($totalWarisan * (2/3),2);
                                break;


                                    //2
                                case ($anaklaki && $anakperempuan):
                                    $bagianAnakLaki = round(($totalWarisan * 2) / $totalRasio * $totalson ,2);
                                    $bagianAnakPerempuan = round(($totalWarisan * 1) / $totalRasio * $totaldaughter ,2);
                                    break;
                            
                                case ($ibu && $anakperempuan):
                                    $bagianAnakPerempuan = round($totalWarisan * (3/4),2);
                                    $bagianIbu = round($totalWarisan * (1/4),2);
                                    break;
                            
                                case ($ibu && $bapak):
                                    $bagianBapak = round($totalWarisan * (2/3),2);
                                    $bagianIbu = round($totalWarisan * (1/3),2);
                                    break;
                            
                                case ($istri && $saudaralaki):
                                    $bagianSaudaraLaki = round($totalWarisan * (3/4),2);
                                    $bagianIstri = round($totalWarisan * (1/4),2);
                                    break;
                            
                                case ($saudaraperempuan && $saudaralaki):
                                    $bagianSaudaraLaki = round($totalWarisan * (2/3),2);
                                    $bagianSaudaraPerempuan = round($totalWarisan * (1/3),2);
                                    break;
                            
                                case ($saudaraperempuan && $anaklaki):
                                    $bagianAnakLaki = $totalWarisan * (1/1);
                                    $bagianSaudaraPerempuan = $totalWarisan * (0);
                                    break;
                            
                                case ($ibu && $anaklaki):
                                    $bagianAnakLaki = round($totalWarisan * (5/6),2);
                                    $bagianIbu = round($totalWarisan * (1/6),2);
                                    break;
                            
                                case ($bapak && $anaklaki):
                                    $bagianAnakLaki = round($totalWarisan * (5/6),2);
                                    $bagianBapak = round($totalWarisan * (1/6),2);
                                    break;
                            
                                case ($istri && $anaklaki):
                                    $bagianAnakLaki = round($totalWarisan * (7/8),2);
                                    $bagianIstri = round($totalWarisan * (1/8),2);
                                    break;
                            
                                case ($saudaralaki && $anaklaki):
                                    $bagianAnakLaki = $totalWarisan * (1/1);
                                    $bagianSaudaraLaki = $totalWarisan * (0);
                                    break;


                                    //1
                                case ($anaklaki):
                                    $bagianAnakLaki = $totalWarisan * (1/1);
                                    break;
                                case ($anakperempuan):
                                    $bagianAnakPerempuan = $totalWarisan * (1/1);
                                    break;
                                case ($ibu):
                                    $bagianIbu = $totalWarisan * (1/1);
                                    break;
                                case ($bapak):
                                    $bagianBapak = $totalWarisan * (1/1);
                                    break;
                                case ($istri):
                                    $bagianIstri = $totalWarisan * (1/1);
                                    break;
                                case ($saudaralaki):
                                    $bagianSaudaraLaki = $totalWarisan * (1/1);
                                    break;
                                case ($saudaraperempuan):
                                    $bagianSaudaraPerempuan = $totalWarisan * (1/1);
                                    break;


            // Tambahkan case lainnya sesuai dengan logika Anda
            // ...
            default:
                // Default case jika tidak ada case yang memenuhi kondisi
                // Lakukan sesuatu jika tidak ada kondisi yang terpenuhi
                break;
        }





        // Ambil data dari formulir ,laki(blm nikah)
        $jenisKelamin = $request->input('gender');
        $status = $request->input('status');
        $kakek = $request->input('kakek');
        $nenek = $request->input('nenek');
        $ibu2 = $request->input('ibu2');
        $bapak2 = $request->input('bapak2');
        $saudaralaki2 = $request->input('saudaralaki2');
        $saudaraperempuan2 = $request->input('saudaraperempuan2');
        

        $bagianKakek = 0;
        $bagianNenek = 0;
        $bagianIbu2 = 0;
        $bagianBapak2 = 0;
        $bagianSaudaraLaki2 = 0;
        $bagianSaudaraPerempuan2 = 0;






        //kondisi laki belum nikah
        switch (true) {
            case ($kakek && $nenek && $ibu2 && $bapak2 && $saudaralaki2 && $saudaraperempuan2):
                $bagianIbu2 = round($totalWarisan * (1/6),2);
                $bagianBapak2 = round($totalWarisan * (5/6),2);
                $bagianKakek = $totalWarisan * (0);
                $bagianNenek = $totalWarisan * (0);
                $bagianSaudaraLaki2 = $totalWarisan * (0);
                $bagianSaudaraPerempuan2 = $totalWarisan * (0);
                break;

                //5
            case ($nenek && $ibu2 && $bapak2 && $saudaralaki2 && $saudaraperempuan2):
                $bagianIbu2 = round($totalWarisan * (1/6),2);
                $bagianBapak2 = round($totalWarisan * (5/6),2);
                $bagianNenek = $totalWarisan * (0);
                $bagianSaudaraLaki2 = $totalWarisan * (0);
                $bagianSaudaraPerempuan2 = $totalWarisan * (0);
                break;

            case ($kakek && $ibu2 && $bapak2 && $saudaralaki2 && $saudaraperempuan2):
                $bagianIbu2 = round($totalWarisan * (1/6),2);
                $bagianBapak2 = round($totalWarisan * (5/6),2);
                $bagianKakek = $totalWarisan * (0);
                $bagianSaudaraLaki2 = $totalWarisan * (0);
                $bagianSaudaraPerempuan2 = $totalWarisan * (0);
                break;

            case ($kakek && $nenek && $bapak2 && $saudaralaki2 && $saudaraperempuan2):
                $bagianNenek = $totalWarisan * (0);
                $bagianBapak2 = $totalWarisan * (1/1);
                $bagianKakek = $totalWarisan * (0);
                $bagianSaudaraLaki2 = $totalWarisan * (0);
                $bagianSaudaraPerempuan2 = $totalWarisan * (0);
                break;

            case ($kakek && $nenek && $ibu2 && $saudaralaki2 && $saudaraperempuan2):
                $bagianNenek = $totalWarisan * (0);
                $bagianIbu2 = round($totalWarisan * (1/6),2);
                $bagianKakek = round($totalWarisan * (2/6),2);
                $bagianSaudaraLaki2 = round($totalWarisan * (2/6),2);
                $bagianSaudaraPerempuan2 = round($totalWarisan * (1/6),2);
                break;

            case ($kakek && $nenek && $ibu2 && $bapak2 && $saudaraperempuan2):
                $bagianNenek = $totalWarisan * (0);
                $bagianIbu2 = round($totalWarisan * (1/3),2);
                $bagianKakek = $totalWarisan * (0);
                $bagianBapak2 = round($totalWarisan * (2/3),2);
                $bagianSaudaraPerempuan2 = $totalWarisan * (0);
                break;

            case ($kakek && $nenek && $ibu2 && $bapak2 && $saudaralaki2):
                $bagianNenek = $totalWarisan * (0);
                $bagianIbu2 = round($totalWarisan * (1/3),2);
                $bagianKakek = $totalWarisan * (0);
                $bagianBapak2 = round($totalWarisan * (2/3),2);
                $bagianSaudaraLaki2 = $totalWarisan * (0);
                break;



                //4
            case ($kakek && $nenek && $ibu2 && $bapak2 ):
                $bagianNenek = $totalWarisan * (0);
                $bagianIbu2 = round($totalWarisan * (1/3),2);
                $bagianKakek = $totalWarisan * (0);
                $bagianBapak2 = round($totalWarisan * (2/3),2);
                break;

            case ($saudaralaki2 && $nenek && $ibu2 && $bapak2 ):
                $bagianNenek = $totalWarisan * (0);
                $bagianIbu2 = round($totalWarisan * (1/3),2);
                $bagianBapak2 = round($totalWarisan * (2/3),2);
                $bagianSaudaraLaki2 = $totalWarisan * (0);
                break;

            case ($saudaralaki2 && $saudaraperempuan2 && $ibu2 && $bapak2 ):
                $bagianSaudaraPerempuan2 = $totalWarisan * (0);
                $bagianIbu2 = round($totalWarisan * (1/6),2);
                $bagianBapak2 = round($totalWarisan * (5/6),2);
                $bagianSaudaraLaki2 = $totalWarisan * (0);
                break;

            case ($saudaralaki2 && $saudaraperempuan2 && $kakek && $bapak2 ):
                $bagianSaudaraPerempuan2 = $totalWarisan * (0);
                $bagianKakek = $totalWarisan * (0);
                $bagianBapak2 = $totalWarisan * (1/1);
                $bagianSaudaraLaki2 = $totalWarisan * (0);
                break;

            case ($saudaralaki2 && $saudaraperempuan2 && $kakek && $nenek ):
                $bagianSaudaraPerempuan2 = round($totalWarisan * (1/6),2);
                $bagianKakek = round($totalWarisan * (2/6),2);
                $bagianNenek = round($totalWarisan * (1/6),2);
                $bagianSaudaraLaki2 = round($totalWarisan * (2/6),2);
                break;

            case ($ibu2 && $saudaraperempuan2 && $kakek && $nenek ):
                $bagianSaudaraPerempuan2 = round($totalWarisan * (3/6),2);
                $bagianKakek = round($totalWarisan * (1/6),2);
                $bagianNenek = $totalWarisan * (0);
                $bagianIbu2 = round($totalWarisan * (2/6),2);
                break;

            case ($ibu2 && $saudaraperempuan2 && $kakek && $nenek ):
                $bagianSaudaraPerempuan2 = round($totalWarisan * (3/6),2);
                $bagianKakek = round($totalWarisan * (1/6),2);
                $bagianNenek = $totalWarisan * (0);
                $bagianIbu2 = round($totalWarisan * (2/6),2);
                break;


                //3
            case ($bapak2 && $kakek && $nenek ):
                $bagianKakek = $totalWarisan * (0);
                $bagianNenek = $totalWarisan * (0);
                $bagianBapak2 = $totalWarisan * (1/1);
                break;

            case ($bapak2 && $ibu2 && $nenek ):
                $bagianIbu2 = round($totalWarisan * (1/3),2);
                $bagianNenek = $totalWarisan * (0);
                $bagianBapak2 = round($totalWarisan * (2/3),2);
                break;

            case ($bapak2 && $ibu2 && $saudaralaki2 ):
                $bagianIbu2 = round($totalWarisan * (1/3),2);
                $bagianSaudaraLaki2 = $totalWarisan * (0);
                $bagianBapak2 = round($totalWarisan * (2/3),2);
                break;

            case ($bapak2 && $saudaraperempuan2 && $saudaralaki2 ):
                $bagianSaudaraPerempuan2 = $totalWarisan * (0);
                $bagianSaudaraLaki2 = $totalWarisan * (0);
                $bagianBapak2 = $totalWarisan * (1/1);
                break;

            case ($kakek && $saudaraperempuan2 && $saudaralaki2 ):
                $bagianSaudaraPerempuan2 = round($totalWarisan * (1/5),2);
                $bagianSaudaraLaki2 = round($totalWarisan * (2/5),2);
                $bagianKakek = round($totalWarisan * (2/5),2);
                break;

            case ($kakek && $saudaraperempuan2 && $nenek ):
                $bagianSaudaraPerempuan2 = round($totalWarisan * (3/6),2);
                $bagianNenek = round($totalWarisan * (1/6),2);
                $bagianKakek = round($totalWarisan * (2/6),2);
                break;


                //2
            case ($kakek && $nenek ):
                $bagianNenek = round($totalWarisan * (1/6),2);
                $bagianKakek = round($totalWarisan * (5/6),2);
                break;

            case ($ibu2 && $nenek ):
                $bagianNenek = $totalWarisan * (0);
                $bagianIbu2 = $totalWarisan * (1/1);
                break;

            case ($ibu2 && $bapak2 ):
                $bagianBapak2 = round($totalWarisan * (2/3),2);
                $bagianIbu2 = round($totalWarisan * (1/3),2);
                break;

            case ($saudaralaki2 && $bapak2 ):
                $bagianBapak2 = $totalWarisan * (1/1);
                $bagianSaudaraLaki2 = $totalWarisan * (0);
                break;

            case ($saudaralaki2 && $saudaraperempuan2 ):
                $bagianSaudaraPerempuan2 = round($totalWarisan * (1/3),2);
                $bagianSaudaraLaki2 = round($totalWarisan * (2/3),2);
                break;

            case ($kakek && $saudaraperempuan2 ):
                $bagianSaudaraPerempuan2 = round($totalWarisan * (1/2),2);
                $bagianKakek = round($totalWarisan * (1/2),2);
                break;


                //1
            case ($kakek):
                $bagianKakek = round($totalWarisan * (1/1),2);
                break;

            case ($nenek):
                $bagianNenek = round($totalWarisan * (1/1),2);
                break;

            case ($ibu2):
                $bagianIbu2 = round($totalWarisan * (1/1),2);
                break;

            case ($bapak2):
                $bagianBapak2 = round($totalWarisan * (1/1),2);
                break;

            case ($saudaralaki2):
                $bagianSaudaraLaki2 = round($totalWarisan * (1/1),2);
                break;

            case ($saudaraperempuan2):
                $bagianSaudaraPerempuan2 = round($totalWarisan * (1/1),2);
                break;

                default:
                // Default case jika tidak ada case yang memenuhi kondisi
                // Lakukan sesuatu jika tidak ada kondisi yang terpenuhi
                break;
        }




        // Ambil data dari formulir ,perempuan(udh nikah)
        $jenisKelamin = $request->input('gender');
        $status = $request->input('status');
        $anaklaki3 = $request->input('anaklaki3');
        $anakperempuan3 = $request->input('anakperempuan3');
        $ibu3 = $request->input('ibu3');
        $bapak3 = $request->input('bapak3');
        $suami = $request->input('suami');
        $saudaralaki3= $request->input('saudaralaki3');
        $saudaraperempuan3 = $request->input('saudaraperempuan3');
        $totalWarisan = $request->input('harta');
        

        $bagianAnakLaki3 = 0;
        $bagianAnakPerempuan3 = 0;
        $bagianIbu3 = 0;
        $bagianBapak3 = 0;
        $bagiansuami = 0;
        $bagianSaudaraLaki3 = 0;
        $bagianSaudaraPerempuan3 = 0;


        //kondisi perempuan  nikah
        switch (true) {
            case ($suami && $anakperempuan3 && $ibu3 && $anaklaki3 && $bapak3 && $saudaralaki3 && $saudaraperempuan3):
                    $bagiansuami = round($totalWarisan * (21/84),2);
                    $bagianIbu3 = round($totalWarisan * (12/72),2);               
                    $bagianBapak3 = round($totalWarisan * (12/72),2);
                    $bagianAnakLaki3 = round((($totalWarisan - ($bagianIbu3 + $bagiansuami + $bagianBapak3)) * 2) / $totalRasio2 * $totalson2 ,2);
                    $bagianAnakPerempuan3 = round((($totalWarisan - ($bagianIbu3 + $bagiansuami + $bagianBapak3)) * 1) / $totalRasio2 * $totaldaughter2 ,2); 
                    $bagianSaudaraLaki3 = $totalWarisan * (0);
                    $bagianSaudaraPerempuan3 = $totalWarisan * (0);
                    break;
                    
                    
            
                    //6
                    case ($anakperempuan3 && $ibu3 && $bapak3 && $suami && $saudaralaki3 && $saudaraperempuan3):
                        $bagianAnakPerempuan3 = round($totalWarisan * (6/13),2);
                        $bagianIbu3 = round($totalWarisan * (2/13),2);
                        $bagianBapak3 = round($totalWarisan * (2/13),2);
                        $bagiansuami = round($totalWarisan * (3/13),2);
                        $bagianSaudaraLaki3 = round($totalWarisan * (0),2);
                        $bagianSaudaraPerempuan3 = round($totalWarisan * (0),2);
                        break;
            
                        case ($anaklaki3 && $ibu3 && $bapak3 && $suami && $saudaralaki3 && $saudaraperempuan3):
                            $bagianAnakLaki3 = round($totalWarisan * (5/12),2);
                            $bagianIbu3 = round($totalWarisan * (2/12),2);
                            $bagianBapak3 = round($totalWarisan * (2/12),2);
                            $bagiansuami = round($totalWarisan * (3/12),2);
                            $bagianSaudaraLaki3 = round($totalWarisan * (0),2);
                            $bagianSaudaraPerempuan3 = round($totalWarisan * (0),2);
                            break;
            
                case ($suami && $anakperempuan3 && $anaklaki3 && $bapak3 && $saudaralaki3 && $saudaraperempuan3):
                        $bagiansuami = round($totalWarisan * (9/36),2);
                        $bagianBapak3 = round($totalWarisan * (12/72),2);
                        $bagianAnakPerempuan3 = round((($totalWarisan - ($bagiansuami + $bagianBapak3)) * 1) / $totalRasio2 * $totaldaughter2 ,2); 
                        $bagianAnakLaki3 = round((($totalWarisan - ($bagiansuami + $bagianBapak3)) * 2) / $totalRasio2 * $totalson2 ,2);
                        $bagianSaudaraLaki3 = $totalWarisan * (0);
                        $bagianSaudaraPerempuan3 = $totalWarisan * (0);
                        break;
            
                case ($suami && $anakperempuan3 && $anaklaki3 && $ibu3 && $saudaralaki3 && $saudaraperempuan3):
                        $bagiansuami = round($totalWarisan * (9/36),2);
                        $bagianIbu3 = round($totalWarisan * (12/72),2);
                        $bagianAnakPerempuan3 = round((($totalWarisan - ($bagiansuami + $bagianIbu3)) * 1) / $totalRasio2 * $totaldaughter2 ,2); 
                        $bagianAnakLaki3 = round((($totalWarisan - ($bagiansuami + $bagianIbu3)) * 2) / $totalRasio2 * $totalson2 ,2);
                        $bagianSaudaraLaki3 = $totalWarisan * (0);
                        $bagianSaudaraPerempuan3 = $totalWarisan * (0);
                        break;
    
                case ($bapak && $anakperempuan3 && $anaklaki3 && $ibu3 && $saudaralaki3 && $saudaraperempuan3):
                        $bagianBapak3 = round($totalWarisan * (3/18),2);
                        $bagianIbu3 = round($totalWarisan * (3/18),2);
                        $bagianAnakPerempuan3 = round((($totalWarisan - ($bagianBapak3 + $bagianIbu3)) * 1) / $totalRasio2 * $totaldaughter2 ,2); 
                        $bagianAnakLaki3 = round((($totalWarisan - ($bagianBapak3 + $bagianIbu3)) * 2) / $totalRasio2 * $totalson2 ,2);
                        $bagianSaudaraLaki3 = $totalWarisan * (0);
                        $bagianSaudaraPerempuan3 = $totalWarisan * (0);
                        break;
                
                case ($bapak3 && $anakperempuan3 && $anaklaki3 && $ibu3 && $suami && $saudaraperempuan3):
                        $bagianBapak3 = round($totalWarisan * (3/18),2);
                        $bagianIbu3 = round($totalWarisan * (3/18),2);
                        $bagiansuami = round($totalWarisan * (9/36),2);
                        $bagianAnakPerempuan3 = round((($totalWarisan - ($bagianBapak3 + $bagianIbu3 + $suami)) * 1) / $totalRasio2 * $totaldaughter2 ,2); 
                        $bagianAnakLaki3 = round((($totalWarisan - ($bagianBapak3 + $bagianIbu3 + $suami)) * 2) / $totalRasio2 * $totalson2 ,2);
                        $bagianSaudaraPerempuan3 = $totalWarisan * (0);
                        break;
                
                case ($bapak3 && $anakperempuan3 && $anaklaki3 && $ibu3 && $suami && $saudaralaki3):
                        $bagianBapak3 = round($totalWarisan * (3/18),2);
                        $bagianIbu3 = round($totalWarisan * (3/18),2);
                        $bagiansuami = round($totalWarisan * (9/36),2);
                        $bagianAnakPerempuan3 = round((($totalWarisan - ($bagianBapak3 + $bagianIbu3 + $bagiansuami)) * 1) / $totalRasio2 * $totaldaughter2 ,2); 
                        $bagianAnakLaki3 = round((($totalWarisan - ($bagianBapak3 + $bagianIbu3 + $bagiansuami)) * 2) / $totalRasio2 * $totalson2 ,2); 
                        $bagianSaudaraLaki3 = $totalWarisan * (0);
                        break;
    
    
                    
                        //5
                    case ($bapak3 && $ibu3 && $suami && $saudaralaki3 && $saudaraperempuan3):
                            $bagianBapak3 = round($totalWarisan * (2/4),2);
                            $bagianIbu3 = round($totalWarisan * (3/4),2);
                            $bagiansuami = round($totalWarisan * (3/6),2);
                            $bagianSaudaraLaki3 = $totalWarisan * (0);
                            $bagianSaudaraPerempuan3 = $totalWarisan * (0);
                            break;
                    
                    case ($bapak3 && $saudaraperempuan3 && $suami && $saudaralaki3 && $anaklaki3):
                            $bagianBapak3 = round($totalWarisan * (4/24),2);
                            $bagianAnakLaki3 = round($totalWarisan * (17/24),2);
                            $bagiansuami = round($totalWarisan * (3/12),2);
                            $bagianSaudaraLaki3 = $totalWarisan * (0);
                            $bagianSaudaraPerempuan3 = $totalWarisan * (0);
                            break;
                    
                    case ($anakperempuan3 && $saudaraperempuan3 && $suami && $saudaralaki3 && $anaklaki3):
                            $bagiansuami = round($totalWarisan * (1/4),2);
                            $bagianAnakPerempuan3 = round((($totalWarisan - $bagiansuami)  * 1) / $totalRasio2 * $totaldaughter2 ,2); 
                            $bagianAnakLaki3 = round((($totalWarisan - $bagiansuami) * 2) / $totalRasio2 * $totalson2 ,2);
                            $bagianSaudaraLaki3 = $totalWarisan * (0);
                            $bagianSaudaraPerempuan3 = $totalWarisan * (0);
                            break;
                    
                    case ($anakperempuan3 && $saudaraperempuan3 && $ibu3 && $saudaralaki3 && $anaklaki3):
                            $bagianIbu3 = round($totalWarisan * (3/18),2);
                            $bagianAnakPerempuan3 = round((($totalWarisan - $bagianIbu3)  * 1) / $totalRasio2 * $totaldaughter2 ,2); 
                            $bagianAnakLaki3 = round((($totalWarisan - $bagianIbu3) * 2) / $totalRasio2 * $totalson2 ,2);
                            $bagianSaudaraLaki3 = $totalWarisan * (0);
                            $bagianSaudaraPerempuan3 = $totalWarisan * (0);
                            break;
                    
                    case ($anakperempuan3 && $saudaraperempuan3 && $ibu3 && $bapak3 && $anaklaki3):
                            $bagianIbu3 = round($totalWarisan * (3/18),2);
                            $bagianBapak3 = round($totalWarisan * (3/18),2);
                            $bagianAnakPerempuan3 = round((($totalWarisan - ($bagianIbu3 + $bagianBapak3))   * 1) / $totalRasio2 * $totaldaughte2r ,2); 
                            $bagianAnakLaki3 = round((($totalWarisan - ($bagianIbu3 + $bagianBapak3)) * 2) / $totalRasio2 * $totalson2 ,2);
                            $bagianSaudaraPerempuan3 = $totalWarisan * (0);
                            break;
                    
                    case ($anakperempuan3 && $suami && $ibu3 && $bapak3 && $anaklaki3):
                            $bagianIbu3 = round($totalWarisan * (12/72),2);
                            $bagiansuami = round($totalWarisan * (9/36),2);
                            $bagianBapak3 = round($totalWarisan * (12/72),2);
                            $bagianAnakPerempuan3 = round((($totalWarisan - ($bagianIbu3 + $bagianBapak3 + $bagiansuami))   * 1) / $totalRasio2 * $totaldaughter2 ,2); 
                            $bagianAnakLaki3 = round((($totalWarisan - ($bagianIbu3 + $bagianBapak3 + $bagiansuami)) * 2) / $totalRasio2 * $totalson2 ,2);
                            break;
                    
                    case ($anakperempuan3 && $suami && $ibu3 && $bapak3 && $saudaralaki3):
                            $bagianAnakPerempuan3 = round($totalWarisan * (12/24),2);
                            $bagianIbu3= round($totalWarisan * (4/24),2);
                            $bagiansuami = round($totalWarisan * (3/13),2);
                            $bagianBapak3 = round($totalWarisan * (5/24),2);
                            $bagianSaudaraLaki3 = $totalWarisan * (0);
                            break;
    
    
    
                            //4
                        case ($suami && $saudaralaki3 && $bapak3 && $saudaraperempuan3):
                                $bagianSaudaraLaki3 = $totalWarisan * (0);
                                $bagianSaudaraPerempuan3 = $totalWarisan * (0);
                                $bagiansuami = round($totalWarisan * (1/2),2);
                                $bagianBapak3 = round($totalWarisan * (3/4),2);
                                break;
                        
                        case ($suami && $saudaralaki3 && $anaklaki3 && $saudaraperempuan3):
                                $bagianSaudaraLaki3 = $totalWarisan * (0);
                                $bagianSaudaraPerempuan3 = $totalWarisan * (0);
                                $bagiansuami = round($totalWarisan * (1/4),2);
                                $bagianAnakLaki3 = round($totalWarisan * (7/8),2);
                                break;
                        
                        case ($anakperempuan3 && $saudaralaki3 && $anaklaki3 && $saudaraperempuan3):
                                $bagianSaudaraLaki3 = $totalWarisan * (0);
                                $bagianSaudaraPerempuan3 = $totalWarisan * (0);
                                $bagianAnakLaki3 = round(($totalWarisan * 2) / $totalRasio2 * $totalson2 ,2);
                                $bagianAnakPerempuan3 = round(($totalWarisan * 1) / $totalRasio2 * $totaldaughter2 ,2);
                                break;
                        
                        case ($anakperempuan3 && $ibu3 && $anaklaki3 && $saudaraperempuan3):
                                $bagianIbu3 = round($totalWarisan * (3/18),2);
                                $bagianSaudaraPerempuan3 = round($totalWarisan * (0),2);
                                $bagianAnakPerempuan3 = round((($totalWarisan - $bagianIbu3 )   * 1) / $totalRasio2 * $totaldaughter2 ,2); 
                                $bagianAnakLaki3 = round((($totalWarisan - $bagianIbu3)  * 2) / $totalRasio2 * $totalson2 ,2);
                                break;
                        
                        case ($anakperempuan3 && $ibu3 && $anaklaki3 && $bapak3):
                                $bagianIbu3 = round($totalWarisan * (3/18),2);
                                $bagianBapak3 = round($totalWarisan * (3/18),2);
                                $bagianAnakPerempuan3 = round((($totalWarisan - ($bagianIbu3 + $bagianBapak3 ))   * 1) / $totalRasio2 * $totaldaughter2 ,2); 
                                $bagianAnakLaki3 = round((($totalWarisan - ($bagianIbu3 + $bagianBapak3 )) * 2) / $totalRasio2 * $totalson2 ,2);
                                break;
                        
                        case ($saudaralaki3 && $ibu3 && $suami && $bapak3):
                                $bagianIbu3 = round($totalWarisan * (1/4),2);
                                $bagianBapak3 = round($totalWarisan * (2/4),2);
                                $bagianSaudaraLaki3 = $totalWarisan * (0);
                                $bagiansuami = round($totalWarisan * (3/13),2);
                                break;
                        
                        case ($saudaralaki3 && $ibu3 && $suami && $bapak3):
                                $bagianIbu3 = round($totalWarisan * (1/4),2);
                                $bagianBapak3 = round($totalWarisan * (2/4),2);
                                $bagianSaudaraLaki3 = $totalWarisan * (0);
                                $bagiansuami = round($totalWarisan * (3/6),2);
                                break;
                                
    
                                //3
                            case ($anaklaki3 && $anakperempuan3 && $ibu3):
                                    $bagianIbu3 = round($totalWarisan * (3/18),2);
                                    $bagianAnakLaki3 = round((($totalWarisan - $bagianIbu3) * 2) / $totalRasio2 * $totalson2 ,2);                                
                                    $bagianAnakPerempuan3 = round((($totalWarisan - $bagianIbu3) *1) / $totalRasio2 * $totaldaughter2 ,2);
                                    break;
                            
                            case ($bapak3 && $anakperempuan3 && $ibu3):
                                    $bagianIbu3 = round($totalWarisan * (1/6),2);
                                    $bagianBapak3 = round($totalWarisan * (2/6),2);
                                    $bagianAnakPerempuan3 = round($totalWarisan * (3/6),2);
                                    break;
                            
                            case ($bapak3 && $bagiansuami && $ibu3):
                                    $bagianIbu3 = round($totalWarisan * (1/4),2);
                                    $bagianBapak3 = round($totalWarisan * (2/4),2);
                                    $bagiansuami = round($totalWarisan * (3/6),2);
                                    break;
                            
                            case ($bapak3 && $suami && $saudaralaki3):
                                    $bagianSaudaraLaki3 = $totalWarisan * (0);
                                    $bagianBapak3 = round($totalWarisan * (3/4),2);
                                    $bagiansuami = round($totalWarisan * (1/4),2);
                                    break;
                            
                            case ($saudaraperempuan3 && $anaklaki3 && $saudaralaki3):
                                    $bagianSaudaraLaki3 = $totalWarisan * (0);
                                    $bagianSaudaraPerempuan3 = $totalWarisan * (0);
                                    $bagianAnakLaki3 = $totalWarisan * (1/1);
                                    break;
                            
                            case ($bagianSaudaraPerempuan3 && $anaklaki3 && $anakperempuan3):
                                    $bagianAnakLaki3 = round(($totalWarisan * 2) / $totalRasio2 * $totalson2 ,2);
                                    $bagianAnakPerempuan3 = round(($totalWarisan * 1) / $totalRasio2 * $totaldaughter2 ,2);
                                    $bagianSaudaraPerempuan3 = $totalWarisan * (0);
                                    break;
    
    
                                        //2
                                    case ($anaklaki3 && $anakperempuan3):
                                        $bagianAnakLaki3 = round(($totalWarisan * 2) / $totalRasio2 * $totalson2 ,2);
                                        $bagianAnakPerempuan3 = round(($totalWarisan * 1) / $totalRasio2 * $totaldaughter2 ,2);
                                        break;
                                
                                    case ($ibu3 && $anakperempuan3):
                                        $bagianAnakPerempuan3 = round($totalWarisan * (3/4),2);
                                        $bagianIbu3 = round($totalWarisan * (1/4),2);
                                        break;
                                
                                    case ($ibu3 && $bapak3):
                                        $bagianBapak3 = round($totalWarisan * (2/3),2);
                                        $bagianIbu3 = round($totalWarisan * (1/3),2);
                                        break;
                                
                                    case ($suami && $saudaralaki3):
                                        $bagianSaudaraLaki3 = round($totalWarisan * (3/4),2);
                                        $bagiansuami = round($totalWarisan * (1/4),2);
                                        break;
                                
                                    case ($saudaraperempuan3 && $saudaralaki3):
                                        $bagianSaudaraLaki = round($totalWarisan * (2/3),2);
                                        $bagianSaudaraPerempuan = round($totalWarisan * (1/3),2);
                                        break;
                                
                                    case ($saudaraperempuan3 && $anaklaki3):
                                        $bagianAnakLaki3 = $totalWarisan * (1/1);
                                        $bagianSaudaraPerempuan3 = $totalWarisan * (0);
                                        break;
                                
                                    case ($ibu3 && $anaklaki3):
                                        $bagianAnakLaki3 = round($totalWarisan * (5/6),2);
                                        $bagianIbu3 = round($totalWarisan * (1/6),2);
                                        break;
                                
                                    case ($bapak3 && $anaklaki3):
                                        $bagianAnakLaki3 = round($totalWarisan * (5/6),2);
                                        $bagianBapak3 = round($totalWarisan * (1/6),2);
                                        break;
                                
                                    case ($suami && $anaklaki3):
                                        $bagianAnakLaki = round($totalWarisan * (7/8),2);
                                        $bagiansuami = round($totalWarisan * (1/8),2);
                                        break;
                                
                                    case ($saudaralaki3 && $anaklaki3):
                                        $bagianAnakLaki3 = $totalWarisan * (1/1);
                                        $bagianSaudaraLaki3 = $totalWarisan * (0);
                                        break;
    
    
                                        //1
                                    case ($anaklaki3):
                                        $bagianAnakLaki3 = $totalWarisan * (1/1);
                                        break;
                                    case ($anakperempuan3):
                                        $bagianAnakPerempuan3 = $totalWarisan * (1/1);
                                        break;
                                    case ($ibu3):
                                        $bagianIbu3 = $totalWarisan * (1/1);
                                        break;
                                    case ($bapak3):
                                        $bagianBapak3 = $totalWarisan * (1/1);
                                        break;
                                    case ($suami):
                                        $bagiansuami = $totalWarisan * (1/1);
                                        break;
                                    case ($saudaralaki3):
                                        $bagianSaudaraLaki3 = $totalWarisan * (1/1);
                                        break;
                                    case ($saudaraperempuan3):
                                        $bagianSaudaraPerempuan3 = $totalWarisan * (1/1);
                                        break;
    
    
                // Tambahkan case lainnya sesuai dengan logika Anda
                // ...
                default:
                    // Default case jika tidak ada case yang memenuhi kondisi
                    // Lakukan sesuatu jika tidak ada kondisi yang terpenuhi
                    break;
            }




        // Ambil data dari formulir ,PEREMPUAN (blm nikah)
        $jenisKelamin = $request->input('gender');
        $status = $request->input('status');
        $kakek = $request->input('kakek');
        $nenek = $request->input('nenek');
        $ibu4 = $request->input('ibu4');
        $bapak4 = $request->input('bapak4');
        $saudaralaki4 = $request->input('saudaralaki4');
        $saudaraperempuan4 = $request->input('saudaraperempuan4');
        

        $bagianKakek = 0;
        $bagianNenek = 0;
        $bagianIbu4 = 0;
        $bagianBapak4 = 0;
        $bagianSaudaraLaki4 = 0;
        $bagianSaudaraPerempuan4 = 0;

        //kondisi PEREMPUAN belum nikah
        switch (true) {
            case ($kakek && $nenek && $ibu4 && $bapak4 && $saudaralaki4 && $saudaraperempuan4):
                $bagianIbu4 = round($totalWarisan * (1/6),2);
                $bagianBapak4 = round($totalWarisan * (5/6),2);
                $bagianKakek = round($totalWarisan * (0),2);
                $bagianNenek = round($totalWarisan * (0),2);
                $bagianSaudaraLaki4 = round($totalWarisan * (0),2);
                $bagianSaudaraPerempuan4 = round($totalWarisan * (0),2);
                break;

                //5
                case ($nenek && $ibu4 && $bapak4 && $saudaralaki4 && $saudaraperempuan4):
                    $bagianIbu4 = round($totalWarisan * (1/6),2);
                    $bagianBapak4 = round($totalWarisan * (5/6),2);
                    $bagianNenek = round($totalWarisan * (0),2);
                    $bagianSaudaraLaki4 = round($totalWarisan * (0),2);
                    $bagianSaudaraPerempuan4 = round($totalWarisan * (0),2);
                    break;

                case ($kakek && $ibu4 && $bapak4 && $saudaralaki4 && $saudaraperempuan4):
                    $bagianIbu4 = round($totalWarisan * (1/6),2);
                    $bagianBapak4 = round($totalWarisan * (5/6),2);
                    $bagianKakek = round($totalWarisan * (0),2);
                    $bagianSaudaraLaki4 = round($totalWarisan * (0),2);
                    $bagianSaudaraPerempuan4 = round($totalWarisan * (0),2);
                    break;

                case ($kakek && $nenek && $bapak4 && $saudaralaki4 && $saudaraperempuan4):
                    $bagianNenek = round($totalWarisan * (0),2);
                    $bagianBapak4 = round($totalWarisan * (1/1),2);
                    $bagianKakek = round($totalWarisan * (0),2);
                    $bagianSaudaraLaki4 = round($totalWarisan * (0),2);
                    $bagianSaudaraPerempuan4 = round($totalWarisan * (0),2);
                    break;

                case ($kakek && $nenek && $ibu4 && $saudaralaki4 && $saudaraperempuan4):
                    $bagianIbu4 = round($totalWarisan * (1/6),2);
                    $bagianNenek = round($totalWarisan * (0),2);
                    $bagianKakek = round($totalWarisan * (2/6),2);
                    $bagianSaudaraLaki4 = round($totalWarisan * (2/6),2);
                    $bagianSaudaraPerempuan4 = round($totalWarisan * (1/6),2);
                    break;

                case ($kakek && $nenek && $ibu4 && $bapak4 && $saudaraperempuan4):
                    $bagianIbu4 = round($totalWarisan * (1/3),2);
                    $bagianNenek = round($totalWarisan * (0),2);
                    $bagianKakek = round($totalWarisan * (0),2);
                    $bagianBapak4 = round($totalWarisan * (2/3),2);
                    $bagianSaudaraPerempuan4 = round($totalWarisan * (0),2);
                    break;

                case ($kakek && $nenek && $ibu4 && $saudaralaki4 && $bapak4):
                    $bagianIbu4 = round($totalWarisan * (1/3),2);
                    $bagianNenek = round($totalWarisan * (0),2);
                    $bagianKakek = round($totalWarisan * (0),2);
                    $bagianBapak4 = round($totalWarisan * (2/3),2);
                    $bagianSaudaraLaki4 = round($totalWarisan * (0),2);
                    break;


                    //4
                case ($bapak4 && $ibu4 && $saudaralaki4 && $saudaraperempuan4):
                    $bagianIbu4 = round($totalWarisan * (1/6),2);
                    $bagianBapak4 = round($totalWarisan * (5/6),2);
                    $bagianSaudaraLaki4 = round($totalWarisan * (0),2);
                    $bagianSaudaraPerempuan4 = round($totalWarisan * (0),2);
                    break;

                case ($bapak4 && $kakek && $saudaralaki4 && $saudaraperempuan4):
                    $bagianKakek = round($totalWarisan * (0),2);
                    $bagianBapak4 = round($totalWarisan * (1/1),2);
                    $bagianSaudaraLaki4 = round($totalWarisan * (0),2);
                    $bagianSaudaraPerempuan4 = round($totalWarisan * (0),2);
                    break;

                case ($nenek && $kakek && $saudaralaki4 && $saudaraperempuan4):
                    $bagianKakek = round($totalWarisan * (2/6),2);
                    $bagianNenek = round($totalWarisan * (1/6),2);
                    $bagianSaudaraLaki4 = round($totalWarisan * (2/6),2);
                    $bagianSaudaraPerempuan4 = round($totalWarisan * (1/6),2);
                    break;

                case ($nenek && $kakek && $ibu4 && $saudaraperempuan4):
                    $bagianKakek = round($totalWarisan * (1/6),2);
                    $bagianNenek = round($totalWarisan * (0),2);
                    $bagianibu4 = round($totalWarisan * (2/6),2);
                    $bagianSaudaraPerempuan4 = round($totalWarisan * (3/6),2);
                    break;

                case ($nenek && $kakek && $ibu4 && $bapak4):
                    $bagianKakek = round($totalWarisan * (0),2);
                    $bagianNenek = round($totalWarisan * (0),2);
                    $bagianibu4 = round($totalWarisan * (1/3),2);
                    $bagianBapak4 = round($totalWarisan * (2/3),2);
                    break;

                case ($nenek && $saudaralaki4 && $ibu4 && $bapak4):
                    $bagianSaudaraLaki4 = round($totalWarisan * (0),2);
                    $bagianNenek = round($totalWarisan * (0),2);
                    $bagianibu4 = round($totalWarisan * (1/3),2);
                    $bagianBapak4 = round($totalWarisan * (2/3),2);
                    break;



                    //3
                case ($saudaralaki4 && $saudaraperempuan4 && $bapak4):
                    $bagianSaudaraLaki4 = round($totalWarisan * (0),2);
                    $bagianSaudaraPerempuan4 = round($totalWarisan * (0),2);
                    $bagianBapak4 = round($totalWarisan * (1/1),2);
                    break;

                case ($saudaralaki4 && $saudaraperempuan4 && $kakek):
                    $bagianSaudaraLaki4 = round($totalWarisan * (2/5),2);
                    $bagianSaudaraPerempuan4 = round($totalWarisan * (1/5),2);
                    $bagianKakek = round($totalWarisan * (2/5),2);
                    break;

                case ($nenek && $saudaraperempuan4 && $kakek):
                    $bagianNenek = round($totalWarisan * (1/6),2);
                    $bagianSaudaraPerempuan4 = round($totalWarisan * (3/6),2);
                    $bagianKakek = round($totalWarisan * (2/6),2);
                    break;

                case ($nenek && $ibu4 && $kakek):
                    $bagianNenek = round($totalWarisan * (0),2);
                    $bagianibu4 = round($totalWarisan * (1/3),2);
                    $bagianKakek = round($totalWarisan * (2/3),2);
                    break;

                case ($nenek && $ibu4 && $bapak4):
                    $bagianNenek = round($totalWarisan * (0),2);
                    $bagianibu4 = round($totalWarisan * (1/3),2);
                    $bagianBapak4 = round($totalWarisan * (2/3),2);
                    break;

                case ($saudaralaki4 && $ibu4 && $bapak4):
                    $bagianSaudaraLaki4 = round($totalWarisan * (0),2);
                    $bagianibu4 = round($totalWarisan * (1/3),2);
                    $bagianBapak4 = round($totalWarisan * (2/3),2);
                    break;


                    //2
                case ($ibu4 && $bapak4):
                    $bagianibu4 = round($totalWarisan * (1/3),2);
                    $bagianBapak4 = round($totalWarisan * (2/3),2);
                    break;
                    
                case ($kakek && $nenek):
                    $kakek = round($totalWarisan * (5/6),2);
                    $nenek = round($totalWarisan * (1/6),2);
                    break;
                    
                case ($bapak4 && $saudaralaki4):
                    $bapak4 = round($totalWarisan * (1/1),2);
                    $saudaralaki4 = round($totalWarisan * (0),2);
                    break;
                    
                case ($saudaraperempuan4 && $saudaralaki4):
                    $saudaraperempuan4 = round($totalWarisan * (1/3),2);
                    $saudaralaki4 = round($totalWarisan * (2/3),2);
                    break;
                    
                case ($saudaraperempuan4 && $kakek):
                    $saudaraperempuan4 = round($totalWarisan * (1/2),2);
                    $kakek = round($totalWarisan * (1/2),2);
                    break;
                    
                case ($saudaraperempuan4 && $nenek):
                    $saudaraperempuan4 = round($totalWarisan * (3/4),2);
                    $nenek = round($totalWarisan * (1/4),2);
                    break;
                    
                case ($saudaraperempuan4 && $ibu4):
                    $saudaraperempuan4 = round($totalWarisan * (3/5),2);
                    $ibu4 = round($totalWarisan * (2/5),2);
                    break;
                    
                case ($saudaraperempuan4 && $bapak4):
                    $saudaraperempuan4 = round($totalWarisan * (0),2);
                    $bapak4 = round($totalWarisan * (1/1),2);
                    break;


                    //1
                                    
                case ($kakek):
                    $bagianKakek = round($totalWarisan * (1/1),);
                    break;
                            
                case ($nenek):
                    $bagianNenek = round($totalWarisan * (1/1),2);
                    break;
                            
                case ($ibu4):
                    $bagianIbu4 = round($totalWarisan * (1/1),2);
                     break;
                            
                case ($bapak4):
                    $bagianBapak4 = round($totalWarisan * (1/1),2);
                    break;
                            
                case ($saudaralaki4):
                    $bagianSaudaraLaki4 = round($totalWarisan * (1/1),2);
                    break;
                            
                case ($saudaraperempuan4):
                    $bagianSaudaraPerempuan4 = round($totalWarisan * (1/1),2);
                    break;
                    
                




                default:
                // Default case jika tidak ada case yang memenuhi kondisi
                // Lakukan sesuatu jika tidak ada kondisi yang terpenuhi
                break;




            }




    

            //dd($request->all());

        
            return view('hasil-hitung')->with([
                'selectedData' => $request->only('harta','anaklaki', 'anakperempuan', 'istri', 'ibu', 'bapak', 'saudaralaki', 
                'saudaraperempuan', 'kakek', 'nenek', 'bapak2', 'ibu2', 'saudaraperempuan2', 'saudaralaki2', 
                'suami', 'ibu3', 'bapak3', 'saudaralaki3', 'saudaraperempuan3', 'anaklaki3', 'anakperempuan3', 
                'ibu4', 'bapak4', 'saudaralaki4', 'saudaraperempuan4'),
                
                'hasilPerhitungan' => [
                    'Mother (From married man)' => $bagianIbu,
                    'Son (From married man)' => $bagianAnakLaki,
                    'Daughter (From married man)' => $bagianAnakPerempuan,
                    'Wife (From male)' => $bagianIstri,
                    'Father (From married man)' => $bagianBapak,
                    'Brother (From married man)' => $bagianSaudaraLaki,
                    'Sister (From married man)' => $bagianSaudaraPerempuan,
                    'Grandfather (From male)' => $bagianKakek,
                    'Grandmother (From male)' => $bagianNenek,
                    'Brother (From single man)' => $bagianSaudaraLaki2,
                    'Sister (From single man)' => $bagianSaudaraPerempuan2,
                    'Father (From single man)' => $bagianBapak2,
                    'Mother (From single man)' => $bagianIbu2,
                    'Mother (From married woman)' => $bagianIbu3,
                    'Mother (From single woman)' => $bagianIbu4,
                    'Father (From married woman)' => $bagianBapak3,
                    'Father (From single woman)' => $bagianBapak4,
                    'Brother (From married woman)' => $bagianSaudaraLaki3,
                    'Sister (From married woman)' => $bagianSaudaraPerempuan3,
                    'Sister (From single woman)' => $bagianSaudaraPerempuan4,
                    'Son (From married woman)' => $bagianAnakLaki3,
                    'Daughter (From married woman)' => $bagianAnakPerempuan3,
                    'Husband' => $bagiansuami,
                
                    // tambahkan hasil perhitungan lainnya di sini
                ],
                'selectedDataf' => $request->only('jenisKelamin','status'),
                'hasilData' => [
                    'Gender' => $jenisKelamin,
                    'Status' => $status,
                ],
    
                'selectedDataf' => $request->only('jenisKelamin','status'),
                'totalHarta' => [
                    'Total assets' => $totalWarisan,
                ],
                // ... tambahkan variabel lainnya yang ingin Anda kirimkan

                'selectedDataf' => $request->only('totalson','totaldaughter'),
                'totalChild' => [
                    'Total Son' => $totalson,
                    'Total Daughter' => $totaldaughter,

                ],

                'selectedDataf' => $request->only('totalson2','totaldaughter2'),
                'totalChild2' => [
                    'Total Son' => $totalson2,
                    'Total Daughter' => $totaldaughter2,

                ],
                // ... tambahkan variabel lainnya yang ingin Anda kirimkan
            ]);
        }
        
    
    }
    