<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'icon',
        'link',
        'target',
        'type',
        'order',
    ];

    /**
     * Get all menu items, in a hierarchical collection.
     * Only supports 2 levels of indentation.
     */
    public static function getTree($type)
    {
        $menu = self::orderBy('lft')->where('type', $type)->where('status', 1)->get();

        if ($menu->count()) {
            foreach ($menu as $k => $menu_item) {
                $menu_item->children = collect([]);

                foreach ($menu as $i => $menu_subitem) {
                    if ($menu_subitem->parent_id == $menu_item->id) {
                        $menu_item->children->push($menu_subitem);

                        // remove the subitem for the first level
                        $menu = $menu->reject(function ($item) use ($menu_subitem) {
                            return $item->id == $menu_subitem->id;
                        });
                    }
                }
            }
        }

        return $menu;
    }
}
