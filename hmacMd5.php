<?php
/**
 * RFC 2104 HMAC implementation for PHP
 * RFC 2104 HMAC 的PHP实现
 * @param  string $data 元数据
 * @param  string $key  密钥
 * @return string hash  散列值
 * @author  Guo Kexin <kexin.guo@gmail.com>
 * @date(2017/5/24)
 */
function hmacMd5($data,$key){
	$b=64;
	if(strlen($key)>$b){
		$key = pack("H*", md5($key));
	}
	$key    = str_pad($key,$b,chr(0x00));
	$ipad   = str_pad('',$b,chr(0x36));
	$opad   = str_pad('',$b,chr(ox5c));
	$k_ipad = $key ^ $ipad;
	$k_opad = $key ^ $opad;
	return md5($k_opad.pack("H*",md5($k_ipad.$data)));
}
