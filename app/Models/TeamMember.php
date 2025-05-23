<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'description',
        'photo',
        'linkedin_url',
        'x_url',
        'facebook_url',
        'instagram_url',
        'display_order',
        'is_active'
    ];

    /**
     * Get active team members ordered by display_order
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getActiveMembers()
    {
        return self::where('is_active', true)
            ->orderBy('display_order')
            ->get();
    }

    /**
     * Get social links that are not empty
     *
     * @return array
     */
    public function getActiveSocialLinks()
    {
        $links = [];
        
        if (!empty($this->linkedin_url)) {
            $links['linkedin'] = $this->linkedin_url;
        }
        
        if (!empty($this->x_url)) {
            $links['x'] = $this->x_url;
        }
        
        if (!empty($this->facebook_url)) {
            $links['facebook'] = $this->facebook_url;
        }
        
        if (!empty($this->instagram_url)) {
            $links['instagram'] = $this->instagram_url;
        }
        
        return $links;
    }
}