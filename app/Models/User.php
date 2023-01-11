<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'purpose',
        'genre',
        'document',
        'document_secondary',
        'document_secondary_complement',
        'date_of_birth',
        'place_of_birth',
        'civil_status',
        'zipcode',
        'street',
        'number',
        'complement',
        'neighborhood',
        'state',
        'city',
        'cell',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Accerssors and Mutators
     */

    public function getCivilStatusTranslateAttribute(string $status, string $genre)
    {

        if ($genre === 'female') {
            if ($status === 'married') {
                return 'casada';
            } elseif ($status === 'separated') {
                return 'separada';
            } elseif ($status === 'single') {
                return 'solteira';
            } elseif ($status === 'divorced') {
                return 'divorciada';
            } elseif ($status === 'widower') {
                return 'viúva';
            } else {
                return '';
            }
        } else {
            if ($status === 'married') {
                return 'casado';
            } elseif ($status === 'separated') {
                return 'separado';
            } elseif ($status === 'single') {
                return 'solteiro';
            } elseif ($status === 'divorced') {
                return 'divorciado';
            } elseif ($status === 'widower') {
                return 'viúvo';
            } else {
                return '';
            }
        }

    }

    public function setPurposeAttribute($value)
    {
        if ($value == 'admin') {
            $this->attributes['purpose'] = 'admin';
        } else {
            $this->attributes['purpose'] = 'collaborate';
        }
    }

    public function setDocumentAttribute($value)
    {
        $this->attributes['document'] = (!empty($value) ? $this->clearField($value) : null);
    }

    public function getDocumentAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        return
            substr($value, 0, 3) . '.' .
            substr($value, 3, 3) . '.' .
            substr($value, 6, 3) . '-' .
            substr($value, 9, 2);
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = (!empty($value) ? $this->convertStringToDate($value) : null);
    }

    public function getDateOfBirthAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        return date('d/m/Y', strtotime($value));
    }

    public function setZipcodeAttribute($value)
    {
        $this->attributes['zipcode'] = (!empty($value) ? $this->clearField($value) : null);
    }

    public function getZipcodeAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        return substr($value, 0, 5) . '-' . substr($value, 5, 3);
    }

    public function setCellAttribute($value)
    {
        $this->attributes['cell'] = (!empty($value) ? $this->clearField($value) : null);
    }

    public function setPasswordAttribute($value)
    {
        if (empty($value)) {
            unset($this->attributes['password']);
            return;
        }

        $this->attributes['password'] = bcrypt($value);
    }

    private function convertStringToDate(?string $param)
    {
        if (empty($param)) {
            return null;
        }

        list($day, $month, $year) = explode('/', $param);
        return (new \DateTime($year . '-' . $month . '-' . $day))->format('Y-m-d');
    }

    private function clearField(?string $param)
    {
        if (empty($param)) {
            return null;
        }

        return str_replace(['.', '-', '/', '(', ')', ' '], '', $param);
    }
}
