<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function parse(Request $request) {

        $site = str_replace("\n","",file_get_contents($request->link));

        $image = explode('<img class="product-image-photo" src="',$site);
        $name = explode('<a class="product-item-link" href="',$site);
        $price = explode('finalPrice" class="price-wrapper "><span class="price">',$site);

        $array = [];

        for ($i=1;$i<=32;$i++) {
            $q = $image[$i];
            $result_image = explode('"',$q)[0];

            $a = $name[$i];
            $s = explode('">',$a)[1];
            $result_name = str_replace(' &quot;','',explode('</a>',$s)[0]);

            $z = $price[$i];
            $x = explode(' դր',$z)[0];
            $c = explode(' ',$x)[0];
            $result_price = explode('դր',$c)[0];

            array_push($array,['name' => $result_name,'image' => $result_image,'price' => $result_price]);
        }

        $result_array = json_decode(json_encode($array),JSON_UNESCAPED_UNICODE);


        for ($i=0;$i<=31;$i++) {

            Item::create([
                'name' => $result_array[$i]['name'],
                'item_description' => fake()->realText($maxNbChars = 200, $indexSize = 2),
                'price' => trim(strtr($result_array[$i]['price'], array_flip(get_html_translation_table(HTML_ENTITIES, ENT_QUOTES))), chr(0xC2).chr(0xA0)),
                'category_id' => $request->category_id,
                'image' => $result_array[$i]['image']
            ]);
        }

        return redirect('admin')->with('parser',32);
    }

    public function download() {

    }

}
