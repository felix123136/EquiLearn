<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        $category_ids = Category::all()->pluck('id')->toArray();
        $images = [
            "https://images.ctfassets.net/aq13lwl6616q/5Vsjisy7BEI69JhQoonaZh/e3dad68c580259a55d3389cb897e5291/complete_web_devloper_zero_to_mastery.png?w=800&h=448&q=50&fm=webp",
            "https://images.ctfassets.net/aq13lwl6616q/6zCIfQKcUgpsnIqOwr3v2K/f5532e81dd84804b053765008e429afb/complete_React_Developer_zero_to_mastery_ztm.png?w=800&h=450&q=50&fm=webp",
            "https://images.ctfassets.net/aq13lwl6616q/2wqtcZLn5BirJ42EDfoair/be61835b9f2afa0b4e85a317a436650c/Python_Cover.jpg?w=750&h=422&q=50&fm=webp",
            "https://images.ctfassets.net/aq13lwl6616q/7cS8gBoWulxkWNWEm0FspJ/c7eb42dd82e27279307f8b9fc9b136fa/nodejs_cover_photo_smaller_size.png?w=800&h=450&q=50&fm=webp",
            "https://images.ctfassets.net/aq13lwl6616q/llkUpPk1NrKR5BMEcfyrc/42ebd1b27f3adb25c4a73fa6de52cd06/advanced_javascript_concepts_cover_photo_new.png?w=800&h=450&q=50&fm=webp",
            "https://images.ctfassets.net/aq13lwl6616q/6bolgTblguVmPNCuPtcPA0/6c5ba82b97b93170d0273565f1380ee0/MLDS_Cover_Photo-.png?w=800&h=450&q=50&fm=webp",
            "https://images.ctfassets.net/aq13lwl6616q/4vObrV5jv9x9QhmAAnlob6/147ff0d8c434f983612402a62e3b25f3/Tensorflow_certificate_zero_to_mastery.png?w=800&h=450&q=50&fm=webp",
            "https://images.ctfassets.net/aq13lwl6616q/2gqVi4hhjq9vgvdh63UoKZ/c763c6f7e98a80eb2800bbe5eb9d690d/react_native_zero_to_mastery.png?w=800&h=449&q=50&fm=webp",
            "https://images.ctfassets.net/aq13lwl6616q/6F802DfBmpgmgUKfFgzeif/74ea9b5d6f987ddd7af36b1dd2094492/nextjs_zero_to_mastery.png?w=800&h=449&q=50&fm=webp",
            "https://images.ctfassets.net/aq13lwl6616q/3947SP4t8nfsq5jjfD8p6R/ea671dd04cb0530700e458e80137231f/4439140_b5f1_3.jpeg?w=750&h=422&q=50&fm=webp",
            "https://images.ctfassets.net/aq13lwl6616q/4wW7nnU5Nuuf9DHIIcO4Zo/7838e981e306b0148c4f902d0b012b53/4403121_33c8.jpeg?w=750&h=422&q=50&fm=webp",
            "https://images.ctfassets.net/aq13lwl6616q/2O22fqP3RbzazB9jszvGGI/821679cbc6d2f926234653c520f24078/ethical_hacking_zero_to_mastery.png?w=800&h=449&q=50&fm=webp",
            "https://images.ctfassets.net/aq13lwl6616q/6xj7YJoJ3XDmZAC84GdkgH/959105f200012c643e8fb2bfc39c61ab/Thumbnail5.png?w=800&h=450&q=50&fm=webp",
            "https://images.ctfassets.net/aq13lwl6616q/1l0V8UVa67J2sBaci1BrWr/67b883dc9079ba82b016edfc8ce9a1c1/Complete_Vue_Zero_to_Mastery.png?w=800&h=450&q=50&fm=webp",
            "https://images.ctfassets.net/aq13lwl6616q/1xrsn8PSTIYrBiLDxFaxQ1/6588289415800efcdc65588c106312af/Web_Security__Bug_Bounty_Zero_to_Mastery.png?w=800&h=450&q=50&fm=webp",
            "https://images.ctfassets.net/aq13lwl6616q/3vnPmfGH8HQPW1DHB9LctQ/ef0af3150371154d8c954253ebf4ca61/SEO_Part1_Cover_Photo.png?w=800&h=444&q=50&fm=webp",
            "https://images.ctfassets.net/aq13lwl6616q/34hurmvc7yzAeeS7jN6mDi/45619435580c8c0bf8550d13933ecd40/nft_101_cover_photo.png?w=800&h=451&q=50&fm=webp",
        ];

        $titles = [
            "Complete React Developer in 2023 (w/ Redux, Hooks, GraphQL)",
            "Complete Python Developer in 2023",
            "JavaScript: The Advanced Concepts",
            "The Complete Junior to Senior Web Developer Roadmap (2023)",
            "Complete SQL + Databases Bootcamp",
            "Complete Machine Learning and Data",
            "PyTorch for Deep Learning",
            "Rust Programming: The Complete Developer's Guide",
            "Complete React Native Developer in 2023",
            "DevOps Bootcamp: Learn Linux & Become a Linux Sysadmin",
            "Complete Next.js Developer in 2023",
            "Go Programming (Golang): The Complete Developer's Guide",
            "Master the Coding Interview: Big Tech (FAANG) Interviews",
            "Complete Ethical Hacking Bootcamp 2023",
            "Complete Angular Developer in 2023",
            "Solidity, Ethereum, and Blockchain: The Complete Developer's Guide"
        ];
        return [
            'name' => $this->faker->randomElement($titles),
            'category_id' => $this->faker->randomElement($category_ids),
            'picture' => $this->faker->randomElement($images),
            'price' => $this->faker->numberBetween(100000, 1000000),
            'description' => $this->faker->paragraph(3),
        ];
    }
}
