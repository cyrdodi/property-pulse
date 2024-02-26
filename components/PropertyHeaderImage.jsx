import React from "react";
import Image from 'next/image';
import Link from 'next/link';
import { FaArrowLeft } from "react-icons/fa6";

const PropertyHeaderImage = ({image}) => {
  return (
    <>
      {/* <!-- Property Header Image --> */}
      <section>
        <div className="container-xl m-auto">
          <div className="grid grid-cols-1">
            <Image
              src={`/images/properties/${image}`}
              height={0}
              width={0}
              sizes="100vw"
              alt=""
              priority={true}
              className="object-cover h-[400px] w-full"
            />
          </div>
        </div>
      </section>

      {/* <!-- Go Back --> */}
      <section>
        <div className="container m-auto py-6 px-6">
          <Link
            href="/properties"
            className="text-blue-500 hover:text-blue-600 flex items-center"
          >
            <FaArrowLeft className="mr-2"></FaArrowLeft> Back to Properties
          </Link>
        </div>
      </section>
    </>
  );
};

export default PropertyHeaderImage;
