<?php

require '../app/Session.php';


// dau tien cu khoi tao 1 class Session de test truoc
// gio phan tich 1 xi
// session thi co nhung dac diem nhu ri/
/**
 * - Start Session
 * - getOneItem
 * - Add key vao session
 * - Update session
 * - Xoa session
 * - Destroy session
 *
 * // them 1 ham destroy session nua
 *
 * // tam 3 cai // gio viet 3 method cho class Session
 *
 * // cho ni mi ok chua? oke
 * // gio di phan tich thang start truoc
 * // ham` start thi khong can tham so' chi can` session_start la dc
 *
 * // gio chay ham session start
 * // ham nay` se return ve true v
 *hm
 * //do goi nhieu lan vi khoi tao class thi sao cung dung toi dung ko mi
 *
 * // roi mang ha mi?
 *
 * // roi ham` session khi start thi no se tra ve 1 id// tao them 1 ham` de get id cua session do'
 * // neu mi chua khoi tao session sion thi get id no se tra ve null
 * // gio mo? session ra// do' , no se tra ve 1 session_id// de check la session da duoc khoi tao
 * // cho ni mi hieu khong?// cais id do la cua session tao san ak mi
 * // uh// cu moi lan mi fresh trang thi id no se khac// phai dong session thi no se khac nham` =))
 * // cho nay~ hong ro lam :v
 * // gio viet tiep ham add session va get all session
 * // gio` run no thu co chay ok khong?
 * // cho nay mi hieu khong? oke
 * // gio thu? dong' 2 ham add lai coi sesion co con luu khong// neu con` luu la ok
 * // no van con luu
 * // gio` thu? ham` desstroy va coi con khong
 * // da xoa het session
 * // gio viet tiep ham` update session
 * // hien gio` la session thamtt = Hello
 * // gio doi thanh HELLO
 * // no chay ok roi`/uh
 * // gio viet ham` xoa'
 * // gio xoa' thu?
 * // hien tai co 2 session// xoa thamtt di
 * // nhu vay la ok roi/oke :D
 *
 * // gio viet them 1 ham de get 1 phan tu? bat' ky trong list session
 * // gio get item thamtt ra thu?
 * // nhu vay la xong :v/:D// hieu? het' chu'/ oke ta hieu// ok// mi coi lai di/oke
 */
$session = new App\Session();
// de add lai thamtt vao
//$session->add('thamtt', 'Hello');
//$session->add('khanh', 'World');
//$session->destroy();

//$session->update('thamtt', 'HELLO');

//$session->delete('thamtt');

echo $session->getOneItem('thamtt');


print_r($session->getAll());